<?php

namespace Fxtutor\Wallet;

use App\Member;
use App\Signal;
use Carbon\Carbon;
use LogicException;
use App\Traits\MetaTraderAccount;
use App\Traits\SignalDestination;
use Illuminate\Support\Facades\DB;
use Fxtutor\Wallet\Traits\Resource;
use Illuminate\Database\Eloquent\Model;
use Fxtutor\Wallet\Events\SubscriptionCancel;
use App\SignalDestination as AppSignalDestination;
use App\Traits\EmailLog;

class Subscription extends Model
{
    use Resource, SignalDestination, MetaTraderAccount, EmailLog;
    /**
     * These constants are possible representations of the status field.
     */
    const STATUS_ACTIVE             = '1';
    const STATUS_CANCELED           = '2'; // cancel or terminate are same
    const STATUS_PAST_DUE           = '3'; // after end of subscription status is past due 
    const STATUS_TRIALING           = '4';
    const STATUS_UNPAID             = '5';
    const STATUS_INCOMPLETE         = '6';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'plan_id',
        'payment_id',
        'status',
        'service',
        'payment_method',
        'start_at',
        'ends_at',
        'trial_ends_at',
        'meta'
    ];

        /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'trial_ends_at',
        'ends_at',
        'start_at',
        'created_at',
        'updated_at',
    ];

    public static $status = [
        'active'     => '1',
        'canceled'   => '2',
        'past_due'   => '3',
        'trialing'   => '4',
        'unpaid'     => '5',
        'incomplete' => '6'
    ];

    protected $casts = [
        'meta' => 'array',
    ];


    public function getStatusAttribute($value)
    {
        $key = array_search($value, self::$status);
       
        if ($key) {
            return ucfirst($key);
        }
    }

    public function setStatusAttribute($value)
    {
        $value = strtolower($value);
        $key = array_search($value, self::$status);

       if ($key) {
            $this->attributes['status'] = $value;
       } else {
            $this->attributes['status'] = self::$status[$value];
       }
    }

    public function securityFund()
    {
        return $this->hasOne(\App\SecurityFund::class, 'subscription_id', 'id');
    }

    /**
     * Get all invoices that owns the subscription.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function invoices()
    {
        return $this->morphMany(Invoice::class, 'resource');
    }

    /**
     * Get the member that owns the subscription.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function member()
    {
        return $this->BelongsTo(Member::class, 'member_id');
    }


    /**
     * get the plan that subscribed the member
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function plan()
    {
        return $this->BelongsTo(Plan::class, 'plan_id');
    }

    /**
     * get the plan that subscribed the member
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function transaction()
    {
        return $this->BelongsTo(Transaction::class, 'payment_id');
    }

    /**
     * Determine if the subscription is active, on trial, or within its grace period.
     *
     * @return bool
     */
    public function valid()
    {
        return $this->active() || $this->onTrial() || $this->onGracePeriod();
    }

    /**
     * Determine if the subscription is incomplete.
     *
     * @return bool
     */
    public function incomplete()
    {
        return $this->status === self::STATUS_INCOMPLETE;
    }

    /**
     * Filter query by incomplete.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return void
     */
    public function scopeIncomplete($query)
    {
        $query->where('status', self::STATUS_INCOMPLETE);
    }

    /**
     * Determine if the subscription is past due.
     *
     * @return bool
     */
    public function pastDue()
    {
        return $this->status === self::STATUS_PAST_DUE;
    }

    /**
     * Filter query by past due.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return void
     */
    public function scopePastDue($query)
    {
        $query->where('status', self::STATUS_PAST_DUE);
    }

    /**
     * Determine if the subscription is active.
     *
     * @return bool
     */
    public function active()
    {
        return (is_null($this->ends_at) || $this->onGracePeriod()) &&
            $this->status !== self::STATUS_INCOMPLETE &&
            $this->status !== self::STATUS_UNPAID;
    }

    /**
     * Filter query by active.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return void
     */
    public function scopeActive($query)
    {
        $query->where(function ($query) {
            $query->whereNull('ends_at')
                ->orWhere(function ($query) {
                    $query->onGracePeriod();
                });
        })->where('status', '!=', self::STATUS_INCOMPLETE)
            ->where('status', '!=', self::STATUS_UNPAID);
    }



    /**
     * Determine if the subscription is recurring and not on trial.
     *
     * @return bool
     */
    public function recurring()
    {
        return ! $this->onTrial() && ! $this->cancelled();
    }

    /**
     * Filter query by recurring.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return void
     */
    public function scopeRecurring($query)
    {
        $query->notOnTrial()->notCancelled();
    }

    /**
     * Determine if the subscription is no longer active.
     *
     * @return bool
     */
    public function cancelled()
    {
        return ! is_null($this->ends_at);
    }

    /**
     * Filter query by cancelled.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return void
     */
    public function scopeCancelled($query)
    {
        $query->whereNotNull('ends_at');
    }

    /**
     * Filter query by not cancelled.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return void
     */
    public function scopeNotCancelled($query)
    {
        $query->whereNull('ends_at');
    }

    /**
     * Determine if the subscription has ended and the grace period has expired.
     *
     * @return bool
     */
    public function ended()
    {
        return $this->cancelled() && ! $this->onGracePeriod();
    }

    /**
     * Filter query by ended.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return void
     */
    public function scopeEnded($query)
    {
        $query->cancelled()->notOnGracePeriod();
    }

    /**
     * Determine if the subscription is within its trial period.
     *
     * @return bool
     */
    public function onTrial()
    {
        return $this->trial_ends_at && $this->trial_ends_at->isFuture();
    }

    /**
     * Filter query by on trial.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return void
     */
    public function scopeOnTrial($query)
    {
        $query->whereNotNull('trial_ends_at')->where('trial_ends_at', '>', Carbon::now());
    }

    /**
     * Filter query by not on trial.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return void
     */
    public function scopeNotOnTrial($query)
    {
        $query->whereNull('trial_ends_at')->orWhere('trial_ends_at', '<=', Carbon::now());
    }

    /**
     * Determine if the subscription is within its grace period after cancellation.
     *
     * @return bool
     */
    public function onGracePeriod()
    {
        return $this->ends_at && $this->ends_at->isFuture();
    }

    /**
     * Filter query by on grace period.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return void
     */
    public function scopeOnGracePeriod($query)
    {
        $query->whereNotNull('ends_at')->where('ends_at', '>', Carbon::now());
    }

    /**
     * Filter query by not on grace period.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return void
     */
    public function scopeNotOnGracePeriod($query)
    {
        $query->whereNull('ends_at')->orWhere('ends_at', '<=', Carbon::now());
    }

    /**
     * Force the trial to end immediately.
     *
     * This method must be combined with swap, resume, etc.
     *
     * @return $this
     */
    public function skipTrial()
    {
        $this->trial_ends_at = null;

        return $this;
    }

    /**
     * Cancel the subscription at the end of the billing period.
     *
     * @return $this
     */
    public function cancel()
    {

        $this->status = self::STATUS_CANCELED;

        // If the member was on trial, we will set the grace period to end when the trial
        // would have ended. Otherwise, we'll retrieve the end of the billing period
        // period and make that the end of the grace period for this current member.
        if (!$this->ends_at && $this->onTrial()) {
            $this->ends_at = $this->trial_ends_at;
        }

        
        $this->save();
        
        event(New SubscriptionCancel($this));
        
        return $this;
    }

    /**
     * Cancel the subscription immediately.
     *
     * @return $this
     */
    public function cancelNow()
    {
        $this->markAsCancelled();

        return $this;
    }

    /**
     * Mark the subscription as cancelled.
     *
     * @return void
     */
    public function markAsCancelled()
    {
        $this->fill([
            'status' => self::STATUS_CANCELED,
            'ends_at' => Carbon::now(),
        ])->save();
    }

    /**
     * Resume the cancelled subscription.
     *
     * @return $this
     * @throws \LogicException
     */
    public function resume()
    {
        if (! $this->onGracePeriod()) {
            throw new LogicException('Unable to resume subscription that is not within grace period.');
        }

        // Finally, we will remove the ending timestamp from the member's record in the
        // local database to indicate that the subscription is active again and is
        // no longer "cancelled". Then we will save this record in the database.
        $this->fill([
            'status' => $this->status,
            'ends_at' => null,
        ])->save();

        return $this;
    }
    /**
     * Determine if the subscription has an incomplete payment.
     *
     * @return bool
     */
    public function hasIncompletePayment()
    {
        return $this->pastDue() || $this->incomplete();
    }

    public static function serviceWiseCount()
    {
        $subscription_count = DB::table('subscriptions')
                ->select(DB::raw("count(`id`) as `count`, `service`"))
                ->groupBy('service')
                ->get();

        $counts = [];
        foreach ($subscription_count as $count) {
            $counts[str_replace("App/", '', $count->service)] = $count->count;
        }
        return $counts;
    }


    public function getPriceAttribute() {
        return floatval($this->plan->price) ;
    }
}
