<?php

namespace App\Listeners;

use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use App\Mail\DepositRequestCanceledEmail;
use Illuminate\Contracts\Queue\ShouldQueue;

class DepositRequestCanceledListener implements ShouldQueue
{

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        Mail::to($event->recepient)->send(new DepositRequestCanceledEmail($event->deposit, $event->subject));
    }
}
