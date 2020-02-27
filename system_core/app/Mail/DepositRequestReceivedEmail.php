<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DepositRequestReceivedEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $deposit;
    public $subject;
    public $method;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($deposit, $subject)
    {
        $this->deposit = $deposit;

        $explode = explode('\\', $deposit->method);
        $this->method = $explode[count($explode) - 1];
        
        $this->subject = $subject;

        $this->deposit->emailLogs()->create([
            'member_id' => $this->deposit->member->id,
            'receiving_contact' => $this->deposit->member->email,
            'mailable' => get_class($this),
            'is_reportable' => false,
            'subject' => $this->subject,
            'meta' => $this->deposit
        ]);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->subject)->markdown('mail.deposit-received');
    }
}
