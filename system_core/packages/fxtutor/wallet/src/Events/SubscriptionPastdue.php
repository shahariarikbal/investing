<?php

namespace Fxtutor\Wallet\Events;

use Fxtutor\Wallet\Subscription;
use Illuminate\Queue\SerializesModels;

class SubscriptionPastdue
{
    use SerializesModels;

    public $subscription;
    public $dayDifference;

    /**
     * Create a new event instance.
     *
     * @param  \App\Order  $order
     * @return void
     */
    public function __construct(Subscription $subscription, $dayDifference)
    {
        $this->subscription = $subscription;
        $this->dayDifference = $dayDifference;
    }
}