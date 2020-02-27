<?php

namespace App\Listeners;

use App\Mail\SubscriptionExpiredEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SubscriptionExpiredListener implements ShouldQueue
{
    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        Mail::to($event->recepient)->send(new SubscriptionExpiredEmail($event->subscription, $event->subject));
    }
}
