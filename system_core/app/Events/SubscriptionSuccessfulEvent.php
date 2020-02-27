<?php

namespace App\Events;

use Fxtutor\Wallet\Invoice;
use Fxtutor\Wallet\Subscription;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class SubscriptionSuccessfulEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $recepient;
    public $subscription;
    public $invoice;
    public $subject;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($recepient, Subscription $subscription, Invoice $invoice, $subject)
    {
        $this->recepient = $recepient;
        $this->subscription = $subscription;
        $this->invoice = $invoice;
        $this->subject = $subject;
    }
}
