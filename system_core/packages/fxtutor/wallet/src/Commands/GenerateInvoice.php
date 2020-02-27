<?php

namespace Fxtutor\Wallet\Commands;

use Carbon\Carbon;
use Fxtutor\Wallet\Plan;
use Fxtutor\Wallet\Invoice;
use Illuminate\Console\Command;
use Fxtutor\Wallet\Subscription;
use Fxtutor\Wallet\SubscriptionBuilder;

class GenerateInvoice extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'subscription:invoice';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generte Subscription Invoice';

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
     * @param  \App\DripEmailer  $drip
     * @return mixed
     */
    public function handle()
    {
        $plans = Plan::with([
                'subscriptions' => function($query){
                    $query->where('status', '!=', Subscription::STATUS_CANCELED)
                        ->where(function($q) {
                            $q->where('ends_at', '<=', Carbon::today()->subDays(10))
                                ->orWhere('trial_ends_at', '<=', Carbon::today()->subDays(10));
                        });
                },
                'subscriptions.member' 
            ])
            ->whereHas('subscriptions', function($query){
                $query->where('status', '!=', Subscription::STATUS_CANCELED)
                    ->where(function($q) {
                        $q->where('ends_at', '<=', Carbon::today()->subDays(10))
                            ->orWhere('trial_ends_at', '<=', Carbon::today()->subDays(10));
                    });
            })
            ->get();

            $plans->each(function($plan){
                $plan->subscriptions->each(function($subscription) use ($plan) {
                    $this->generatePDF($subscription);
                });
                
            });
    }


    private function generatePDF(Subscription $subscription)
    {
        $invoice = Invoice::unpaid()->where('resource_id', $subscription->id)->orderBy('due_date', 'desc');

        if ($subscription->ends_at) {
            $invoice  = $invoice->whereDate('due_date', '>=', $subscription->ends_at->subDays(11));
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
