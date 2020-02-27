<?php

namespace App\Listeners;

use App\Mail\SubscriptionSuspendedEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SubscriptionSuspendedListener implements ShouldQueue
{
    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        Mail::to($event->recepient)->send(new SubscriptionSuspendedEmail($event->subscription, $event->subject));
    }
}
