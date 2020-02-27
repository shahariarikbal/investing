<?php

namespace Fxtutor\Wallet\Listeners;

use Fxtutor\Wallet\Plan;
use Fxtutor\Wallet\Subscription;
use Fxtutor\Wallet\SubscriptionBuilder;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ApproveSubscriptionListener
{
    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $subscription = Subscription::find($event->subscription);

        $plan = Plan::find($subscription->plan_id);
        // return $subscription;
        return (new SubscriptionBuilder($plan, $subscription->member))->renew($subscription);
    }
}
