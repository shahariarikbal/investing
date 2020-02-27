<?php

namespace App\Listeners;

use Illuminate\Support\Facades\Mail;
use App\Mail\SignalNotificationEmail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class PremiumSignalNotificationListener implements ShouldQueue
{
    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        Mail::to($event->recepient)->send(new SignalNotificationEmail($event->signal, $event->subject));
    }
}
