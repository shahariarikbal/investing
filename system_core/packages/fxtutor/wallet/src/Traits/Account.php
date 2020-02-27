<?php

namespace Fxtutor\Wallet\Traits;

use Fxtutor\Wallet\Account as AccountModel;
use Fxtutor\Wallet\Deposit;
use Fxtutor\Wallet\Invoice;
use Fxtutor\Wallet\Plan;
use Fxtutor\Wallet\Subscription;
use Fxtutor\Wallet\SubscriptionBuilder;
use Fxtutor\Wallet\Transaction as TransactionModel;
use Fxtutor\Wallet\Withdraw;

trait Account
{

    /**
     * Get account of member.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function account()
    {
        return $this->hasOne(AccountModel::class, 'member_id');
    }

    public function currentAccountCurrency()
    {
        return session("member.$this->id", 'usd');
    }

    public function currentAccount()
    {
        return $this->account()->where('currency', $this->currentAccountCurrency());
    }

    public function getBalanceAttribute()
    {
        return $this->currentAccount->balance;
    }

    public function getRestrictedAttribute()
    {
        return $this->currentAccount->restricted;
    }

    public function getInreviewAttribute()
    {
        return $this->currentAccount->inreview;
    }

    public function getPendingAttribute()
    {
        return $this->currentAccount->pending;
    }

    public function getSecurityAttribute()
    {
        return $this->currentAccount->security;
    }

    public function restrictBalance($balance, $unRestrict = false)
    {
        if ($unRestrict) {
            return $this->account()->where('currency', $this->currentAccountCurrency())->decrement('restricted', $balance);
        }
        return $this->account()->where('currency', $this->currentAccountCurrency())->increment('restricted', $balance);
    }

    /************************************************************************************/
    /**
     * Get transections of user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function transactions()
    {
        return $this->hasMany(TransactionModel::class);
    }

    public function transaction($balance_type = TransactionModel::BALANCE, $action, $amount, $currency = 'usd', $type = 'debit', $meta = [], $resource = null)
    {
        if ($type === 'debit') {
            $this->subtractBalance($amount, $balance_type);
        } elseif ($type === 'credit') {
            $this->addBalance($amount, $balance_type);
        }
    
        $transaction = new TransactionModel([
            'balance_type' => $balance_type,
            'action' => $action,
            'amount' => $amount,
            'currency' => $currency,
            'balance' => $this->{TransactionModel::$balanceTypes[$balance_type]},
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

    public function debitTransaction($balance_type, $action, $amount, $meta = [], $resource = null, $currecy = 'usd')
    {
        return $this->transaction($balance_type, $action, $amount, $currecy, 'debit', $meta, $resource);
    }

    public function creditTransaction($balance_type, $action, $amount, $meta = [], $resource = null, $currecy = 'usd')
    {
        return $this->transaction($balance_type, $action, $amount, $currecy, 'credit', $meta, $resource);
    }

    public function hasBalance($balance)
    {
        return ($this->account->balance - $this->account->restricted) >= $balance;
    }

    
    public function pendingBalance($balance, $decrement= false)
    {
        if ($decrement) {
            return $this->account()->decrement('pending', $balance);
        }
        return $this->account()->increment('pending', $balance);
        
    }

    public function updateBalance($balance)
    {
        $this->account()->balance = $balance;
        $this->save();

        return $this;
    }
    // public function restrictBalance($balance, $unRestrict = false)
    // {
    //     if ($unRestrict) {
    //         return $this->decrement('restricted', $balance);
    //     }
    //     return $this->increment('restricted', $balance);
    // }

    public function subtractBalance($amount, $balance_type)
    {
        $this->account()->decrement(TransactionModel::$balanceTypes[$balance_type], $amount);
    }

    public function addBalance($amount, $balance_type)
    {
        $this->account()->increment(TransactionModel::$balanceTypes[$balance_type], $amount);
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

    public function deposits() {
        return $this->hasMany(Deposit::class);
    }

    public function withdraws() {
        return $this->hasMany(Withdraw::class);
    }

    // public function scopeApprovedDeposit($query) {
    //     $query->deposits()->where('status', Deposit::APPROVED);
    // }

    // public function scopeUnapprovedDeposit($query) {
    //     $query->deposits()->where('status', Deposit::UNAPPROVED);
    // }

    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }

}