<?php

namespace Fxtutor\Wallet\Commands;

use Carbon\Carbon;
use Fxtutor\Wallet\Plan;
use Illuminate\Console\Command;
use Fxtutor\Wallet\Subscription;
use Fxtutor\Wallet\SubscriptionBuilder;

class RenewSubscription extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'subscription:renew';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Renew subscriptions';

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
                            $q->where('ends_at', '<=', Carbon::tomorrow())
                                ->orWhere('trial_ends_at', '<=', Carbon::tomorrow());
                        });
                },
                'subscriptions.member' 
            ])
            ->whereHas('subscriptions', function($query){
                $query->where('status', '!=', Subscription::STATUS_CANCELED)
                    ->where(function($q) {
                        $q->where('ends_at', '<=', Carbon::tomorrow())
                            ->orWhere('trial_ends_at', '<=', Carbon::tomorrow());
                    });
            })
            ->get();

            $plans->each(function($plan){
                $plan->subscriptions->each(function($subscription) use ($plan) {
                    (new SubscriptionBuilder($plan, $subscription->member))->payment($subscription);
                });
                
            });
    }
}
