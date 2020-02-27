<?php

namespace Fxtutor\Wallet\Listeners;

use App\Mail\InvoiceEmail;
use Fxtutor\Wallet\Invoice;
use Fxtutor\Wallet\Subscription;
use Illuminate\Support\Facades\Mail;
use App\Mail\SubscriptionSuccessfulEmail;
use App\Events\SubscriptionSuccessfulEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Fxtutor\Wallet\Events\SubscriptionCreated As EventSubscriptionCreated;

class NewSubscriptionInvoice implements ShouldQueue
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
    public function handle(EventSubscriptionCreated $event)
    {
        $subscription = $event->subscription;
        if ( $subscription->status !== 'Active') {
            return;
        }
        $transection = $subscription->transaction;
        $invoice = Invoice::unpaid()->where('resource_id', $subscription->id)->orderBy('due_date', 'desc');

        if ($subscription->ends_at) {
            $invoice  = $invoice->whereDate('due_date', '>=', $subscription->ends_at->subDays(10));
        }
        $invoice = $invoice->first();
     
        if (!$invoice) {
            $invoice = new Invoice;
            $invoice->setPayableAmount($event->payable_amount);
            $invoice->subscription($subscription);
            $invoice->name = 'subscription';
            $invoice->member_id = $subscription->member_id;
            $invoice->due_date = $subscription->ends_at;
        }
        

        if ($transection && $transection->created_at->isToday()) {
            $invoice->transaction_id = $transection->id;
            $invoice->paidDate();
            $invoice->dueDate();
            $invoice->status = Invoice::STATUS_PAID;
            if (isset($transection->meta['discount_rate']) && is_array($transection->meta['discount_rate']) ) {
                $invoice->discount($transection->meta['discount_rate']);
            }  
        }

        
        $invoice->save();
        
        $subject = $subscription->plan->name . " " . str_replace("App\\", "", $subscription->service) . " plan subscription successful";

        Mail::to($subscription->member->email)->send(new SubscriptionSuccessfulEmail($subject, $subscription, $invoice));

        // event(new SubscriptionSuccessfulEvent($subscription->member->email, $subscription, $invoice, $subject));

        // $invoice = Invoice::with(['member', 'subscriptionDetails.plan'])->where('id', $invoice->id)->first();

        // \Log::debug($invoice->subscription_details->service);
        // $subject = "New Invoice For" . str_replace('App\\', '', $invoice->subscription_details->service) . " Plan Subscription"; 

        // Mail::to($subscription->member->email)->send(new InvoiceEmail($invoice, $subject));
    }

    
}