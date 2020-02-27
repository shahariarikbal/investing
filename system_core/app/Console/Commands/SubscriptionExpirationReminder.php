<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\FundManagement;
use Fxtutor\Wallet\Plan;
use Fxtutor\Wallet\Invoice;
use Illuminate\Console\Command;
use Fxtutor\Wallet\Subscription;
use App\Events\SubscriptionExpiredReminderEvent;

class SubscriptionExpirationReminder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'subscription:expiration-reminder {day}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create due invoice for subscriotion that has no cancellation request or non recurring plan (e.g. fund management) acccepting parameter day as integer';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $expiration_day = Carbon::now()->addDays($this->argument('day'));
        // check subscription that are ends at argument day
        $subscriptions = Subscription::where('status', Subscription::STATUS_ACTIVE)->where('ends_at', '<=', $expiration_day)->get();

        $subscriptions = $subscriptions->filter(function($subscription) {
            return $subscription->service !== FundManagement::class && $subscription->plan->recursive && $subscription->cancellable == 0; // check user cancellation request
        });


        $subscripionIDs = $subscriptions->pluck('id');

        foreach($subscripionIDs as $id) {
            $this->generateInvoiceIFNotPresent(Subscription::find($id));
        }

        $invoices = Invoice::whereIn('resource_id', $subscripionIDs)->where('status', Invoice::STATUS_UNPAID)->get();
        // \Log::debug($subscripionIDs);
        // \Log::debug($invoices);
        if ($invoices->count()) {
            foreach($invoices as $invoice) {
                $subject = 'Upcoming service expiration ' . $this->argument('day') . ' days reminder';
          
                event(new SubscriptionExpiredReminderEvent($invoice->member->email, $invoice, $subject));
            }
        }
        
    }

    private function generateInvoiceIFNotPresent(Subscription $subscription)
    {
        $invoice = Invoice::unpaid()->where('resource_id', $subscription->id)->orderBy('due_date', 'desc');

        if ($subscription->ends_at) {
            $invoice  = $invoice->whereDate('due_date', '>=', $subscription->ends_at->subDays($this->argument('day')));
        }
        $invoice = $invoice->first();
        
        if (!$invoice) {
            $invoice = new Invoice;
            $invoice->subscription($subscription, 'renew');
        }
        
        $invoice->name = 'subscription';
        $invoice->member_id = $subscription->member_id;
            
        $invoice->due_date = $subscription->ends_at;
        
        $invoice->save();
    }
}
