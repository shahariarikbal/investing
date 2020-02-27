<?php

namespace App\Mail;

use App\MonthlyTradeStatement;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MonthlyTradeStatementNotificationEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $recepient;
    public $statement;
    public $subject;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($recepient, MonthlyTradeStatement $statement, $subject)
    {
        $this->recepient = $recepient;
        $this->statement = $statement;
        $this->subject = $subject;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->subject)->markdown('mail.monthly-trade-statement');
    }
}
