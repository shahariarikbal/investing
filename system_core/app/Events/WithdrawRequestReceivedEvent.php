<?php

namespace App\Events;

use Fxtutor\Wallet\Withdraw;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class WithdrawRequestReceivedEvent
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
