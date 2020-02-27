<?php

namespace App\Events;

use App\MonthlyTradeStatement;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class MonthlyTradeStatementNotificationEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $recepient;
    public $statement;
    public $subject;

    /**
     * register data
     *
     * @param array $recepient
     * @param App\MonthlyTradeStatement $statement
     * @param string $subject
     * 
     * @return void
     */
    public function __construct($recepient, MonthlyTradeStatement $statement, $subject)
    {
        $this->recepient = $recepient;
        $this->statement = $statement;
        $this->subject = $subject;
    }
}
