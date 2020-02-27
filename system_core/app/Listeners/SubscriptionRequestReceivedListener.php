<?php

namespace App\Listeners;

use App\Mail\SubscriptionRequestReceivedEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SubscriptionRequestReceivedListener implements ShouldQueue
{
    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        Mail::to($event->recepient)->send(new SubscriptionRequestReceivedEmail($event->subject, $event->subscription));
    }
}
