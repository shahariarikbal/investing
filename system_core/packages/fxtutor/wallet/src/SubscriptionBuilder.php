<?php

namespace Fxtutor\Wallet;

use App\Member;
use App\SecurityFund;
use App\User;
use Exception;
use Carbon\Carbon;
use Fxtutor\Wallet\Plan;
use Fxtutor\Wallet\Subscription;
use Illuminate\Support\Facades\Auth;
use Fxtutor\Wallet\Events\SubscriptionCreated;
use Fxtutor\Wallet\Events\SubscriptionPastdue;
use Fxtutor\Wallet\Events\SubscriptionRenewed;
use Fxtutor\Wallet\Transaction as TransactionModel;

class SubscriptionBuilder
{
    /**
     * user that is subscribing.
     *
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $owner;

    /**
     * The name of the plan being subscribed to.
     *
     * @var string
     */
    protected $plan;

    /**
     * The date and time the trial will expire.
     *
     * @var \Carbon\Carbon|\Carbon\CarbonInterface
     */
    protected $trialExpires;

    /**
     * Indicates that the trial should end immediately.
     *
     * @var bool
     */
    protected $skipTrial = false;

    /**
     * Indicate that payment will be skiped for this time
     *
     * @var boolean
     */
    protected $skipPayment = false;

    /**
     * Settings for this subscription
     *
     * @var array
     */
    protected $settings = array();

    /**
     * Permissions for this subscription
     *
     * @var array
     */
    protected $permissions = array();

    /**
     * Role for this subscription
     *
     * @var array
     */
    protected $roles = array();

    /**
     * Discount percentage
     *
     * @var int
     */
    protected $discount = 0;

    /**
     * Payment method
     *
     * @var string
     */
    public $payment_method;

    public $subscriptionStatus;

    public $payable_amount = 0;

    /**
     * Create a new subscription builder instance.
     *
     * @param  mixed  $owner
     * @param  string  $name
     * @param  string  $plan
     * @return void
     */
    public function __construct(Plan $plan, Member $owner=null)
    {
        $this->plan = $plan;
        if ($owner) {
            $this->owner = $owner;
        } else {
            $this->owner = auth()->guard('api')->user();
        }
        
        $this->settings = collect($this->plan->settings);
    }

    /**
     * Specify the number of days of the trial.
     *
     * @param  int  $trialDays
     * @return $this
     */
    public function trialDays($trialDays)
    {
        $this->trialExpires = Carbon::now()->addDays($trialDays);

        return $this;
    }


    /**
     * Specify the ending date of the trial.
     *
     * @param  \Carbon\Carbon|\Carbon\CarbonInterface  $trialUntil
     * @return $this
     */
    public function trialUntil($trialUntil)
    {
        $this->trialExpires = $trialUntil;

        return $this;
    }

    /**
     * Force the trial to end immediately.
     *
     * @return $this
     */
    public function skipTrial()
    {
        $this->skipTrial = true;

        return $this;
    }
    /**
     * Force skip payment now. payment will be leter
     *
     * @return $this
     */
    public function skipPayment()
    {
        $this->subscriptionStatus = Subscription::STATUS_UNPAID;
        $this->skipPayment = true;

        return $this;
    }

    public function setPayableAmount($payable_amount) {
        $this->payable_amount = floatval($payable_amount);
    }

    public function setPaymentMethod($payment_method) {
        $this->payment_method = $payment_method;
    }

    /**
     * Set Discount percentage
     *
     * @param array $discount
     * @return void
     */
    public function setDiscount(array $discount)
    {
        $this->discount = $discount;
        return $this;
    }

    /**
     * get discount percentage
     *
     * @return int
     */
    public function getDiscount()
    {
        return $this->discount;
    }

        /**
     * retrive the setting opption for this plane
     *
     * @param string $service
     * @param string $plane
     *
     * @return array
     */

    public function getSettings()
    {        
        return $this->settings; 
    }

    /**
     * set settings option for this plane
     *
     * @param [type] $settings
     * @return void
     */
    public function setSettings($settings)
    {
        $this->settings = $this->settings->replaceRecursive($settings);

        return $this;
    }
    
    /**
     * Create a new subscription.
     *
     */
    public function create()
    {
        $settings = $this->getSettings();
        
        // check existing subscription
        $subscription = $this->owner->subscriptions->firstWhere('plan_id', $this->plan->id);

        if ($subscription) {
            throw new Exception("You already subscribe to this plan.");
        }

        if ($this->skipTrial) {
            $trialEndsAt = null;
        } else if ($this->trialExpires) {
            $trialEndsAt = $this->trialExpires;
        } else {
            $trialEndsAt = Carbon::now()->addDays($settings['trail_days']);
        }

        $subscription =  $this->owner->subscriptions()->create([
            'plan_id' => $this->plan->id,
            'status' => $this->subscriptionStatus,
            'service' => $this->plan->service,
            'payment_method' => $this->payment_method,
            'trial_ends_at' => $trialEndsAt
        ]);

        $subscription = $this->chargePayment($subscription);
        
        $subscription->save();
        
        if ($subscription->trial_ends_at && $subscription->trial_ends_at->isFuture()) {
            $this->syncPermissions();
        } elseif ($subscription->ends_at && $subscription->ends_at->isFuture()){
            $this->syncPermissions();
        }

        if ($subscription->status === 'Active') {
            event(new SubscriptionCreated($subscription));
        }

        return $subscription;
    }

    /**
     * Renew the subscriptipon
     * 
     * @return Subscription
     */
    public function payment(Subscription $subscription, $type ='renew')
    {
         try {
            $subscription = $this->chargePayment($subscription, $type);
          
            if (is_a($subscription, Subscription::class)) {
                $subscription->save();
                
                if ($type == 'renew') {
                    event(new SubscriptionRenewed($subscription));
                } else {
                    event(new SubscriptionCreated($subscription, $this->payable_amount));
                }

                $this->syncPermissions();
                // $this->syncRoles();

                return $subscription;
            }
            

        } catch (Exception $ex) {
            $this->makePastDue($subscription);
            throw new Exception("Cant renew your subscription:". $ex->getMessage());
        }
    }

    /**
     * Renew the subscriptipon
     * 
     * @return void
     */
    public function makePastDue(Subscription $subscription)
    {
        $subscription->fill([
            'status' => Subscription::STATUS_PAST_DUE,
            'trial_ends_at' => null
        ])->save();

        $this->removePermissions();
        // $this->removeRole();

        event(new SubscriptionPastdue($subscription));
    }

    /**
     * charge payment for this 
     *
     * @return Subscription|Exception
     */
    protected function chargePayment(Subscription $subscription, $type = 'create')
    {
        if ($this->skipPayment) {
            return $subscription; 
        }
        $price = $this->price();
      
        if (!$this->owner->hasBalance($price['total'])) {
            throw new Exception("You have not enough balance to subscribed.");
        }

        if ($subscription->onTrial()) {
            $end = $subscription->trial_ends_at->addDays($this->billingDays());
        } elseif ($subscription->ends_at && $subscription->ends_at->isFuture()) {

            $end = $subscription->ends_at->addDays($this->billingDays());
        } else {
            $end = Carbon::now()->addDays($this->billingDays());
        }

        $subscription->fill([
            'trial_ends_at' => null,
            'start_at' => Carbon::now(),
            'ends_at' => $end,
            'status' => Subscription::STATUS_ACTIVE
        ]);

        

        $meta = [
            'plan_id' => $subscription->plan_id,
            'service' => $subscription->service,
            'payment_method' => $subscription->payment_method,
            'ends_at' => $subscription->ends_at,
        ];

        $meta = array_merge($meta, $price);

        
        $transection = $this->owner->debitTransaction(TransactionModel::BALANCE, "subscription_$type", $price['total'], $meta, $subscription);
        
        if ( !$transection ) {
            throw new Exception("Transection can't create.");
        }

        $subscription->payment_id = $transection->id;

        return $subscription;
    }


    /**
     * Calculate and get the price with tax and discount
     *
     * @return array $price
     */

    protected function price()
    {
        $price = [];
   
        if ($this->payable_amount > 0) {
            $price['total'] = $this->payable_amount;
        } else {
            $price['subtotal'] = $this->plan->price;
            $price['discount_rate'] = $this->getDiscount();
            $price['discount'] = $this->discount($price['subtotal']);
            $price['total'] = $price['subtotal'] - $price['discount'];
        }
        return $price;
    }

    /**
     * Calculate and get the discount of price in this service
     *
     * @param array $option
     * @param null| Subscription $subscription
     *
     * @return float $discount
     */

    protected function discount($amonut)
    {
        $rate = $this->getDiscount();
        if ($rate['type'] === 'percentage') {
            return (floatval($rate['rate'])*$amonut)/100;
        } else {
            return $rate['rate'];
        }
        return 0;
    }
    /**
     * get billing cycle days
     *
     * @return int $days
     */
    protected function billingDays()
    {
        $option = $this->getSettings();
        switch ($option['billing']) {
            case 'daily':
                return 1;
            case 'monthly':
                return Carbon::now()->daysInMonth;
            case 'quarterly':
                return 91;
            case 'biyearly':
                return 364/2;
            case 'yearly':
                return 365;
            
            default:
                return 0;
        }
    }

    public function setPermissions($permissions)
    {
        $option = $this->getSettings();
        $default = collect($option['permissions']);

        if (is_callable($permissions)) {
            $this->permissions = call_user_func($permissions, $default);
        } else {
            $this->permissions = $default->merge($permissions);
        }
    }

    public function getPermissions()
    {
        $option = $this->getSettings();
        
        $default = collect($option['permissions']);

        if (!empty($this->permissions)) {
            return $this->permissions;
        }

        return $default;
    }

    protected function syncPermissions()
    {
        $permissions = $this->getPermissions();
        if (!empty($permissions)) {
            $this->owner->givePermissionTo($permissions);
        }
    }

    protected function removePermissions()
    {
        $permissions = $this->getPermissions();
        if (!empty($permissions)) {
            $this->owner->revokePermissionTo($permissions);
        }
    }

    public function setRoles($roles)
    {
        $option = $this->getSettings();
        $default = collect($option['roles']);

        if (is_callable($roles)) {
            $this->roles = call_user_func($roles, $default);
        } else {
            $this->roles = $default->merge($roles);
        }
    }

    public function getRoles()
    {
        $option = $this->getSettings();
        $default = collect($option['roles']);

        if (!empty($this->roles)) {
            return $this->roles;
        }

        return $default;
    }

    protected function syncRoles()
    {
        $roles = $this->getRoles();
        if (!empty($roles)) {
            $this->owner->assignRole($roles);
        }
    }

    protected function removeRole()
    {
        $roles = $this->getRoles();
        if (!empty($roles)) {
            $this->owner->removeRole($roles);
        }
    }
}
