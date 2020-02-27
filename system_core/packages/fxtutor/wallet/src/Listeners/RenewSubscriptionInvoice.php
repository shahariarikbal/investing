<?php

namespace Fxtutor\Wallet\Listeners;

use App\Mail\SubscriptionRenewalSuccessfulEmail;
use Fxtutor\Wallet\Invoice;
use Fxtutor\Wallet\Subscription;
use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Fxtutor\Wallet\Events\SubscriptionRenewed;

class RenewSubscriptionInvoice implements ShouldQueue
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
    public function handle(SubscriptionRenewed $event)
    {
        $subscription = $event->subscription;

        if ($subscription->status !== 'Active') {
            return;
        }

        $transection = $subscription->transaction;
        $invoice = Invoice::unpaid()->where('resource_id', $subscription->id)->orderBy('due_date', 'desc');

        if ($subscription->ends_at) {
            $invoice  = $invoice->whereDate('due_date', '=', $event->invoice_due_date);
        }
        $invoice = $invoice->first();
        
        if (!$invoice) {
            $invoice = new Invoice;
            $invoice->subscription($subscription, 'renew');
            $invoice->name = 'subscription';
            $invoice->member_id = $subscription->member_id;
            $invoice->due_date = $subscription->ends_at;
        }
        
        
        if ($transection && $transection->created_at->isToday()) {
            $invoice->transaction_id = $transection->id;
            $invoice->paidDate();
            // $invoice->dueDate();
            $invoice->status = Invoice::STATUS_PAID;
            if (isset($transection->meta['discount_rate']) && is_array($transection->meta['discount_rate']) ) {
                $invoice->discount($transection->meta['discount_rate']);
            }  
        }

        
        $invoice->save();

        // send email with subscription renewed with invoice
        $subject = "Renewal of " . $subscription->plan->name . " " . str_replace("App\\", "", $subscription->service) . " plan subscription successful";

        Mail::to($subscription->member->email)->send(new SubscriptionRenewalSuccessfulEmail($subject, $subscription, $invoice));

    }

    
}