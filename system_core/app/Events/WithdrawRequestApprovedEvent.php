<?php

namespace App\Events;

use Fxtutor\Wallet\Withdraw;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class WithdrawRequestApprovedEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $recepient;
    public $withdraw;
    public $subject;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($recepient, Withdraw $withdraw, $subject)
    {
        $this->recepient = $recepient;
        $this->withdraw = $withdraw;
        $this->subject = $subject;
    }
}
