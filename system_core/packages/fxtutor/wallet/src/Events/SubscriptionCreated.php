<?php

namespace Fxtutor\Wallet\Events;

use Fxtutor\Wallet\Subscription;
use Illuminate\Queue\SerializesModels;

class SubscriptionCreated
{
    use SerializesModels;

    public $subscription;
    public $payable_amount;

    /**
     * Create a new event instance.
     *
     * @param  \App\Order  $order
     * @return void
     */
    public function __construct(Subscription $subscription, $payable_amount = null)
    {
        $this->subscription = $subscription;
        $this->payable_amount = $payable_amount;
    }
}