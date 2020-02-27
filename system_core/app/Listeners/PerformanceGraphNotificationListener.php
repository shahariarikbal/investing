<?php

namespace App\Listeners;

use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Mail\PerformanceGraphNotificationEmail;

class PerformanceGraphNotificationListener implements ShouldQueue
{
    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        Mail::to($event->recepient->email)->send(new PerformanceGraphNotificationEmail($event->recepient, $event->graph, $event->subject));
    }
}
