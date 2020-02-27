<?php

namespace App\Listeners;

use App\Mail\SubscriptionExpiredReminderEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SubscriptionExpiredReminderListener implements ShouldQueue
{
    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        Mail::to($event->recepient)->send(new SubscriptionExpiredReminderEmail($event->subject, $event->invoice));
    }
}
