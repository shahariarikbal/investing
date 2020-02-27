<?php

namespace App\Listeners;

use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use App\Mail\WithdrawRequestApprovedEmail;
use Illuminate\Contracts\Queue\ShouldQueue;

class WithdrawRequestApprovedListener implements ShouldQueue
{

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        Mail::to($event->recepient)->send(new WithdrawRequestApprovedEmail($event->withdraw, $event->subject));
    }
}
