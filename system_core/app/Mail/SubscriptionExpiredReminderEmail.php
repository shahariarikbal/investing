<?php

namespace App\Mail;

use Fxtutor\Wallet\Invoice;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SubscriptionExpiredReminderEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $subject;
    public $invoice;
    public $service;
    
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($subject, Invoice $invoice)
    {
        $this->subject = $subject;
        $this->invoice = $invoice;

        $this->service = str_replace("App\\", "", $this->invoice->subscriptionDetails->service);

        $this->invoice->emailLogs()->create([
            'member_id' => $this->invoice->member->id,
            'receiving_contact' => $this->invoice->member->email,
            'mailable' => get_class($this),
            'is_reportable' => false,
            'subject' => $this->subject,
            'meta' => json_encode([
                'invoice' => $this->invoice,
                'subscription' => $this->invoice->subscriptionDetails
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
        return $this->subject($this->subject)->markdown('mail.subscription-expired-reminder');
    }
}
