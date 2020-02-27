<?php

namespace App\Listeners;

use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use App\Mail\WithdrawRequestCanceledEmail;
use Illuminate\Contracts\Queue\ShouldQueue;

class WithdrawRequestCanceledListener implements ShouldQueue
{

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        Mail::to($event->recepient)->send(new WithdrawRequestCanceledEmail($event->withdraw, $event->subject));
    }
}
