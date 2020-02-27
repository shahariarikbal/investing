<?php

namespace App\Listeners;

use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use App\Mail\SubscriptionSuccessfulEmail;
use Illuminate\Contracts\Queue\ShouldQueue;

class SubscriptionSuccessfulListener implements ShouldQueue
{
    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        Mail::to($event->recepient)->send(new SubscriptionSuccessfulEmail($event->subject, $event->subscription, $event->invoice));
    }
}
