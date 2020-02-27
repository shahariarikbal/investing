<?php

namespace App\Mail;

use Fxtutor\Wallet\Invoice;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Fxtutor\Wallet\Subscription;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SubscriptionRenewedEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $subject;
    public $subscription;
    
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($subject, Subscription $subscription, Invoice $invoice)
    {
        $this->subject = $subject;
        $this->subscription = $subscription;
        $this->invoice = $invoice;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->subject)->markdown('mail.subscription-renewed');
    }
}
