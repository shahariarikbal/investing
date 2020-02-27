<?php

namespace Fxtutor\Wallet\Listeners;

class EventsSubscriber
{


    /**
     * Register the listeners for the subscriber.
     *
     * @param  \Illuminate\Events\Dispatcher  $events
     */
    public function subscribe($events)
    {
        // $events->listen(
        //     'Fxtutor\Wallet\Events\SubscriptionCreated',
        //     'Fxtutor\Wallet\Listeners\SubscriptionCreated'
        // );

        $events->listen(
            'Fxtutor\Wallet\Events\SubscriptionCreated',
            'Fxtutor\Wallet\Listeners\AffiliateCommission'
        );

        $events->listen(
            'Fxtutor\Wallet\Events\SubscriptionCreated',
            'Fxtutor\Wallet\Listeners\NewSubscriptionInvoice'
        );

        // $events->listen(
        //     'Fxtutor\Wallet\Events\SubscriptionRenewed',
        //     'Fxtutor\Wallet\Listeners\SubscriptionRenewed'
        // );

        $events->listen(
            'Fxtutor\Wallet\Events\SubscriptionRenewed',
            'Fxtutor\Wallet\Listeners\AffiliateCommission'
        );

        $events->listen(
            'Fxtutor\Wallet\Events\SubscriptionRenewed',
            'Fxtutor\Wallet\Listeners\RenewSubscriptionInvoice'
        );

        $events->listen(
            'Fxtutor\Wallet\Events\SubscriptionPastdue',
            'Fxtutor\Wallet\Listeners\SubscriptionOverDue'
        );
    }
}