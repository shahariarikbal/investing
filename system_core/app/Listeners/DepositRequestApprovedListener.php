<?php

namespace App\Listeners;

use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use App\Mail\DepositRequestApprovedEmail;
use Illuminate\Contracts\Queue\ShouldQueue;

class DepositRequestApprovedListener implements ShouldQueue
{

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        Mail::to($event->recepient)->send(new DepositRequestApprovedEmail($event->deposit, $event->subject));
    }
}
