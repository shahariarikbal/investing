<?php

namespace Fxtutor\Wallet;

use Exception;
use Carbon\Carbon;
use App\SecurityFund;
use Illuminate\Http\Request;
use Fxtutor\Wallet\Subscription;
use App\Events\SubscriptionCanceledEvent;
use Fxtutor\Wallet\Events\SubscriptionCreated;
use Fxtutor\Wallet\Events\SubscriptionPastdue;
use Fxtutor\Wallet\Events\SubscriptionRenewed;
use Fxtutor\Wallet\Transaction as TransactionModel;

class IPSubscriptionBuilder extends SubscriptionBuilder
{

    protected $multiple_subscription = false;

    public function setMultipleSubscription(Bool $status) {
        $this->multiple_subscription = $status;
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

        if (!$this->multiple_subscription && $subscription) {
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

        if ($subscription->service === 'App\FundManagement') {
            $subscription->securityFund()->update([
                'status' => SecurityFund::STATUS_ACTIVE,
                'meta' => $meta
            ]);
            $this->owner->creditTransaction(TransactionModel::SECURITY, "security_fund", $price['total'], $meta, $subscription);
        }

        $subscription->payment_id = $transection->id;

        return $subscription;
    }


    public function cancel(Request $request, Subscription $subscription)
    {
        $this->_cancel($request['reason'], $subscription);
    }

    private function _cancel($reason, Subscription $subscription, $cancelUnpaidInvoice = NULL)
    {
        $subscription->update([
            'status' => Subscription::STATUS_CANCELED,
            'meta' => ['cancel_reason' => $reason]
        ]);
        // cancel unpaid invoice
        if ($cancelUnpaidInvoice) {
            Invoice::unpaid()
                    ->where('resource_id', $subscription->id)
                    ->whereDate('due_date', '=', $subscription->ends_at)
                    ->update(['status' => Invoice::STATUS_CANCEL]);
        }

        $subject = $subscription->plan->name . " " . str_replace("App\\", "", $subscription->service) . " plan subscription canceled";
        event(new SubscriptionCanceledEvent($subscription->member->email, $subscription, $subject));
    }


    /**
     * Renew the subscriptipon
     * 
     * @return Subscription
     */
    public function payment(Subscription $subscription, $type ='renew')
    {
         try {
            if ($type === 'renew') {
                $due_date = $subscription->ends_at;
            }
             
            $subscription = $this->chargePayment($subscription, $type);
          
            if (is_a($subscription, Subscription::class)) {
                $subscription->save();
                
                if ($type == 'renew') {
                    event(new SubscriptionRenewed($subscription, $due_date));
                } else {
                    event(new SubscriptionCreated($subscription, $this->payable_amount));
                }

                $this->syncPermissions();
                // $this->syncRoles();
                return $subscription;
            }
            

        } catch (Exception $ex) {
            $dayDifference = Carbon::now()->diffInDays($subscription->ends_at);
            if ($dayDifference > 2) {
                $this->_cancel('Could not charge payment from wallet after third attempt', $subscription, TRUE);
            }
            if ($dayDifference === 1 || $dayDifference === 2) {
                $this->makePastDue($subscription, $dayDifference);
            }
            throw new Exception("Cant renew your subscription:". $ex->getMessage());
        }
    }

    /**
     * Renew the subscriptipon
     * 
     * @return void
     */
    public function makePastDue(Subscription $subscription, $dayDifference = NULL)
    {
        $subscription->fill([
            'status' => Subscription::STATUS_PAST_DUE,
            'trial_ends_at' => null
        ])->save();

        $this->removePermissions();
        // $this->removeRole();
        // if day difference is 1. notify them with past due invoice

        // if day difference is 2. notify with final notice
        event(new SubscriptionPastdue($subscription, $dayDifference));
    }
}