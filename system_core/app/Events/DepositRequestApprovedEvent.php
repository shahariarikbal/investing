<?php

namespace App\Events;

use Fxtutor\Wallet\Deposit;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class DepositRequestApprovedEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $recepient;
    public $deposit;
    public $subject;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($recepient, Deposit $deposit, $subject)
    {
        $this->recepient = $recepient;
        $this->deposit = $deposit;
        $this->subject = $subject;
    }
}
