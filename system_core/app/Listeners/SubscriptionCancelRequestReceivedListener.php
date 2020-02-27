<?php

namespace App\Listeners;

use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Mail\SubscriptionCancelRequestReceivedEmail;

class SubscriptionCancelRequestReceivedListener implements ShouldQueue
{
    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        // send email to member
        Mail::to($event->recepient)->send(new SubscriptionCancelRequestReceivedEmail($event->subject, $event->subscription));
    }
}
