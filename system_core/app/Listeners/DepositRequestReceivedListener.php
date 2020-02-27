<?php

namespace App\Listeners;

use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use App\Mail\DepositRequestReceivedEmail;
use Illuminate\Contracts\Queue\ShouldQueue;

class DepositRequestReceivedListener implements ShouldQueue
{

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        Mail::to($event->recepient)->send(new DepositRequestReceivedEmail($event->deposit, $event->subject));
    }
}
