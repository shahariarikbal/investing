<?php

namespace App\Mail;

use App\PerformanceGraph;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PerformanceGraphNotificationEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $recepient;
    public $graph;
    public $subject;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($recepient, PerformanceGraph $graph, $subject)
    {
        $this->recepient = $recepient;
        $this->graph = $graph;
        $this->subject = $subject;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->subject)->markdown('mail.performance-graph');
    }
}
