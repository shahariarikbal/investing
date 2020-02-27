<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MemberEmailVerificationSuccessful extends Mailable
{
    use Queueable, SerializesModels;

    public $member;
    public $token;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($member)
    {
        $this->member = $member;
        $this->subject = "Your email has been verify";

        $this->member->emailLogs()->create([
            'member_id' => $this->member->id,
            'receiving_contact' => $this->member->email,
            'mailable' => get_class($this),
            'is_reportable' => false,
            'subject' => $this->subject,
            'meta' => json_encode([
                'token' => $this->token,
                'member' => $this->member
            ])
        ]);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->subject)->markdown('mail.member-register-success-verification-email');
    }
}
