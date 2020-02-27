<?php

namespace App\Events;

use Fxtutor\Wallet\Subscription;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class SubscriptionRenewalInvoiceEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $recepient;
    public $subscription;
    public $subject;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($recepient, Subscription $subscription, $subject)
    {
        $this->recepient = $recepient;
        $this->subscription = $subscription;
        $this->subject = $subject;
    }
}
