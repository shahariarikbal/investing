<?php

namespace Fxtutor\Wallet\Events;

use Fxtutor\Wallet\Subscription;
use Illuminate\Queue\SerializesModels;

class SubscriptionCancel
{
    use SerializesModels;

    public $subscription;

    /**
     * Create a new event instance.
     *
     * @param  \App\Order  $order
     * @return void
     */
    public function __construct(Subscription $subscription)
    {
        $this->subscription = $subscription;
    }
}