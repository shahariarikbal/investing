<?php

namespace Fxtutor\Wallet\Events;

use Fxtutor\Wallet\Subscription;
use Illuminate\Queue\SerializesModels;

class SubscriptionRenewed
{
    use SerializesModels;

    public $subscription;
    public $invoice_due_date;

    /**
     * Create a new event instance.
     *
     * @param  \App\Order  $order
     * @return void
     */
    public function __construct(Subscription $subscription, $invoice_due_date)
    {
        $this->subscription = $subscription;
        $this->invoice_due_date = $invoice_due_date;
    }
}