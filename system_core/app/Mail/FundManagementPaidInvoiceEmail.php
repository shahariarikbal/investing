<?php

namespace App\Mail;

use Fxtutor\Wallet\Invoice;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use App\MonthlyTradeStatement;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class FundManagementPaidInvoiceEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $subject;
    public $statement;
    public $invoice;
    public $service;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($subject, MonthlyTradeStatement $statement, Invoice $invoice)
    {
        $this->subject = $subject;
        $this->statement = $statement;
        $this->invoice = $invoice;

        $this->service = str_replace("App\\", "", $this->statement->service);

        $this->statement->emailLogs()->create([
            'member_id' => $this->statement->member->id,
            'receiving_contact' => $this->statement->member->email,
            'mailable' => get_class($this),
            'is_reportable' => false,
            'subject' => $this->subject,
            'meta' => $this->statement
        ]);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->subject)->markdown('mail.fundmanagement-paid-invoice');
    }
}
