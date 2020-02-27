<?php

namespace Fxtutor\Wallet\Events;

use Illuminate\Queue\SerializesModels;

class SubscriptionPaidEvent
{
    use SerializesModels;

    public $subscription;

    /**
     * Create a new event instance.
     *
     * @param  \App\Order  $order
     * @return void
     */
    public function __construct($subscription)
    {
        $this->subscription = $subscription;
    }
}