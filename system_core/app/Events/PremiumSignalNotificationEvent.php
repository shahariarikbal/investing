<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PremiumSignalNotificationEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $recepient;
    public $signal;
    public $subject;
    /**
     * register data
     *
     * @param [type] $recepient
     * @param App\Signal $signal
     * @param [type] $subject
     * 
     * @return void
     */
    public function __construct($recepient, $signal, $subject)
    {
        $this->recepient = $recepient;
        $this->signal = $signal;
        $this->subject = $subject;
    }
}
