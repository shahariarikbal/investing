<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Exception;
use Fxtutor\Wallet\Plan;
use Fxtutor\Wallet\Invoice;
use Illuminate\Console\Command;
use Fxtutor\Wallet\Subscription;
use Fxtutor\Wallet\SubscriptionBuilder;
use Fxtutor\Wallet\IPSubscriptionBuilder;

class SubscriptionChargeDueInvoice extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'subscription:charge-due-invoice {day?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Charge due invoice now/following days; accepting parameter day as number';

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
        $plans = Plan::with([
            'subscriptions' => function($query){
                $query->whereIn('status', [Subscription::STATUS_PAST_DUE, Subscription::STATUS_ACTIVE])
                    ->where(function($q) {
                        $q->whereDate('ends_at', '<=', Carbon::now())
                            ->orWhereDate('trial_ends_at', '<=', Carbon::now());
                    });
            },
            'subscriptions.member' 
        ])
        ->whereHas('subscriptions', function($query){
            $query->whereIn('status', [Subscription::STATUS_PAST_DUE, Subscription::STATUS_ACTIVE])
                ->where(function($q) {
                    $q->whereDate('ends_at', '<=', Carbon::now())
                        ->orWhere('trial_ends_at', '<=', Carbon::now());
                });
        })
        ->get();
        $plans->each(function($plan){
            $plan->subscriptions->each(function($subscription) use ($plan) {
                try {
                    $subscription = (new IPSubscriptionBuilder($plan, $subscription->member))->payment($subscription);
                } catch (Exception $exception) {
                    \Log::debug($subscription);

                }
            });
            
        });
    }
}
