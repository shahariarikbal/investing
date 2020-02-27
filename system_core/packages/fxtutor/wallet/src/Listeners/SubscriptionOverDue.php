<?php

namespace Fxtutor\Wallet\Listeners;

use Fxtutor\Wallet\Invoice;
use Fxtutor\Wallet\Subscription;
use Illuminate\Support\Facades\Mail;
use App\Mail\FinalOverDueReminderEmail;
use App\Mail\FirstOverDueReminderEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Fxtutor\Wallet\Events\SubscriptionPastdue;

class SubscriptionOverDue implements ShouldQueue
{


    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  SubscriptionCreated  $event
     * @return void
     */
    public function handle(SubscriptionPastdue $event)
    {
        $event->subscription;

        $subject = $event->subscription->plan->name . " " . str_replace("App\\", "", $event->subscription->service) . " plan subscription";

        $invoice = Invoice::unpaid()
                            ->where('resource_id', $event->subscription->id)
                            ->whereDate('due_date', '=', $event->subscription->ends_at)
                            ->first();

        if ($event->dayDifference == 1) {
            $subject = "First overdue reminder for " . $subject;
            Mail::to($event->subscription->member->email)->send(new FirstOverDueReminderEmail($subject, $event->subscription, $invoice));
        }

        if ($event->dayDifference == 2) {
            $subject = "Final overdue reminder for " . $subject;
            Mail::to($event->subscription->member->email)->send(new FinalOverDueReminderEmail($subject, $event->subscription, $invoice));
        }
    }

    
}