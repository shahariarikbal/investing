<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class CustomerContactEmail extends Mailable
{
    use Queueable, SerializesModels;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $contact;
    public function __construct($contact)
    {
        $this->contact = $contact;

    }


    /**
     * Build the message.
     *
     * @return $this
     */

    public function build()
    {
        return $this->subject('Thank you for contact with us')->markdown('mail.contact-email-to-customer');
    }
}
