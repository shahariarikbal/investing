<?php

namespace App\Listeners;

use Illuminate\Support\Facades\Mail;
use App\Mail\SubscriptionCanceledEmail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SubscriptionCanceledListener implements ShouldQueue
{
    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        Mail::to($event->recepient)->send(new SubscriptionCanceledEmail($event->subject, $event->subscription));
    }
}
