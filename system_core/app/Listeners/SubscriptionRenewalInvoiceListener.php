<?php

namespace App\Listeners;

use App\Mail\SubscriptionRenewalInvoiceEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SubscriptionRenewalInvoiceListener implements ShouldQueue
{
    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        Mail::to($event->recepient)->send(new SubscriptionRenewalInvoiceEmail($event->subscription, $event->subject));
    }
}
