<?php

namespace Fxtutor\Wallet\Listeners;


use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Fxtutor\Wallet\Mails\SubscriptionRenewedMail;
use Fxtutor\Wallet\Events\SubscriptionCreated As EventSubscriptionCreated;

class SubscriptionRenewed implements ShouldQueue
{


    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  SubscriptionCreated  $event
     * @return void
     */
    public function handle(EventSubscriptionCreated $event)
    {
        Mail::to($event->subscription->member->email)->send(
            new SubscriptionRenewedMail($event->subscription)
        );
    }
}