<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SignalNotificationEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $signal;
    public $subject;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($signal, $subject)
    {
        $this->signal = $signal;
        $this->subject = $subject;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->subject)->markdown('mail.premium-signal');
    }
}
