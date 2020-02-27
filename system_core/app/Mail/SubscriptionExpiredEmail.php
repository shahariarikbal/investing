<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Fxtutor\Wallet\Subscription;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SubscriptionExpiredEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $subject;
    public $subscription;
    public $service;
    
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($subject, Subscription $subscription)
    {
        $this->subject = $subject;
        $this->subscription = $subscription;

        $this->service = str_replace("App\\", "", $this->subscription->service);

        $this->subscription->emailLogs()->create([
            'member_id' => $this->subscription->member->id,
            'receiving_contact' => $this->subscription->member->email,
            'mailable' => get_class($this),
            'is_reportable' => false,
            'subject' => $this->subject,
            'meta' => $this->subscription
        ]);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->subject)->markdown('mail.subscription-expired');
    }
}
