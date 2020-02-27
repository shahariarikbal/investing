<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WithdrawRequestCanceledEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $withdraw;
    public $subject;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($withdraw, $subject)
    {
        $this->withdraw = $withdraw;
        $this->subject = $subject;

        $this->withdraw->emailLogs()->create([
            'member_id' => $this->withdraw->member->id,
            'receiving_contact' => $this->withdraw->member->email,
            'mailable' => get_class($this),
            'is_reportable' => false,
            'subject' => $this->subject,
            'meta' => $this->withdraw
        ]);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->subject)->markdown('mail.withdraw-canceled');
    }
}
