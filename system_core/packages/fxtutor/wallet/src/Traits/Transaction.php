<?php

namespace Fxtutor\Wallet\Traits;

use Carbon\Carbon;
use Fxtutor\Wallet\Plan;
use Fxtutor\Wallet\Subscription;
use Fxtutor\Wallet\SubscriptionBuilder;
use Fxtutor\Wallet\Transaction as TransactionModel;

trait Transaction
{
    /**
     * Get transections of member.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function transactions()
    {
        return $this->hasMany(TransactionModel::class);
    }

    public function transaction($action, $amount, $currency = 'usd', $type = 'debit', $meta = [], $resource = null)
    {
        if ($type === 'debit') {
            $this->subtractBalance($amount);
        } elseif ($type === 'credit') {
            $this->addBalance($amount);
        }

        $transaction = new TransactionModel([
            'action' => $action,
            'amount' => $amount,
            'currency' => $currency,
            'balance' => $this->balance,
            'meta' => $meta,
        ]);

        $transaction->type = $type == 'credit' ? TransactionModel::CREDIT : TransactionModel::DEBIT;

        if ($resource){
            $transaction->resource_type =  get_class($resource);
            $transaction->resource_id = $resource->id;
        }


        $transaction = $this->transactions()->save($transaction);

        return $transaction;
    }

    public function debitTransaction($action, $ammount, $meta = [], $resource = null, $currecy = 'usd')
    {
        return $this->transaction($action, $ammount, $currecy, 'debit', $meta, $resource);
    }

    public function creditTransaction($action, $ammount, $meta = [], $resource = null, $currecy = 'usd')
    {
        return $this->transaction($action, $ammount, $currecy, 'credit', $meta, $resource);
    }

    public function hasBalance($balance)
    {
        return ($this->balance - $this->restricted) >= $balance;
    }
    
    public function pendingBalance($balance, $decrement= false)
    {
        if ($decrement) {
            return $this->decrement('pending', $balance);
        }
        return $this->increment('pending', $balance);
        
    }

    public function updateBalance($balance)
    {
        $this->balance = $balance;
        $this->save();

        return $this;
    }
    public function restrictBalance($balance, $unRestrict = false)
    {
        if ($unRestrict) {
            return $this->decrement('restricted', $balance);
        }
        return $this->increment('restricted', $balance);
    }

    public function subtractBalance($amount)
    {
        $this->decrement('balance', $amount);
    }

    public function addBalance($amount)
    {
        $this->increment('balance', $amount);
    }

    /**Subscription methods */
    /**
    * Get all of the subscriptions .
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function subscriptions()
    {
        return $this->hasMany(Subscription::class, 'member_id')->orderBy('created_at', 'desc');
    }

    /**
     * Get a subscription instance by name.
     *
     * @param  string  $service
     * @return Fxtutor\Wallet\Subscription;|null
     */
    public function subscription($service)
    {
        return $this->subscriptions->sortByDesc(function ($value) {
            return $value->created_at->getTimestamp();
        })->first(function ($value) use ($service) {
            return $value->service === $service;
        });
    }

    /**
     * Determine has a given subscription.
     *
     * @param  string  $service
     * @param  string|null  $plan
     * @return bool
     */
    public function subscribed($service, $plan = null)
    {
        $subscription = $this->subscription($service);

        if (is_null($subscription)) {
            return false;
        }

        if (is_null($plan)) {
            return $subscription->valid();
        }

        return $subscription->valid() &&
               $subscription->plan_id === $plan;
    }
    /**
     * Determine has a given subscription.
     *
     * @param  string  $service
     * @param  string|null  $plan
     * @return bool
     */
    public function subscribedToService($service)
    {
    }

    public function isPaidMembership()
    {
    }

    /**
     * Begin creating a new subscription.
     *
     * @param  string  $service
     * @param  string  $plan
     */
    public function newSubscription(Plan $plan)
    {
        return new SubscriptionBuilder($plan, $this);
    }
}
