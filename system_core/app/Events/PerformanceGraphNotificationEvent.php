<?php

namespace App\Events;

use App\PerformanceGraph;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class PerformanceGraphNotificationEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $recepient;
    public $graph;
    public $subject;

    /**
     * register data
     *
     * @param [type] $recepient
     * @param App\PerformanceGraph $graph
     * @param [type] $subject
     * 
     * @return void
     */
    public function __construct($recepient, PerformanceGraph $graph, $subject)
    {
        $this->recepient = $recepient;
        $this->graph = $graph;
        $this->subject = $subject;
    }
}
