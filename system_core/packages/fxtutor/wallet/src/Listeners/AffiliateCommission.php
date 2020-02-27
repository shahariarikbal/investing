<?php
namespace Fxtutor\Wallet\Listeners;


use Fxtutor\Wallet\Affiliate;
use Fxtutor\Wallet\Transaction;
use Fxtutor\Wallet\Subscription;
use Illuminate\Contracts\Queue\ShouldQueue;
use Fxtutor\Wallet\Events\SubscriptionCreated as EventSubscriptionCreated;

class AffiliateCommission implements ShouldQueue
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
    public function handle($event)
    {
        if ($event->subscription->service === 'App\\FundManagement') {
            return;
        }
        $subscription = Subscription::with(['member', 'plan', 'transaction'])->find($event->subscription->id);
        $affiliats = isset($subscription->plan->settings['affiliate']) ? $subscription->plan->settings['affiliate'] : null;
        $enableAffiliate = isset($subscription->plan->settings['enable_affiliate']) ? $subscription->plan->settings['enable_affiliate']: null;

        if (!$enableAffiliate || $subscription->status !== 'Active') {
            return;
        }

        $trasaction = $subscription->transaction;

        $alreadyPaid = Transaction::where('action', 'affiliate_commission')
            ->where('resource_type', Transaction::class)
            ->where('resource_id', $trasaction->id)->exists();

        if ($alreadyPaid) {
            return;
        }

        if (!empty($trasaction->meta['total'])) {
            $amount = $trasaction->meta['total'];
        } else {
            $amount = $trasaction->amount;
        }
        

        $depth = sizeof($affiliats);

        $members = Affiliate::getParentsTree($subscription->member, $depth);
        $currnet = $members->parent;
        $meta = [
            'ref_member_id' => $members->id,
            'member_name' => $members->full_name,
            'plan_id' => $subscription->plan->id,
            'service' => $subscription->plan->service,
            'amount' => $amount
        ];
        $self = $this;

        return collect($affiliats)->sortBy('lavel')->each(function ($a) use (&$currnet, $self, $amount, $meta, $trasaction) {
            if ($currnet) {
                $self->memberCommission($currnet, $a, $amount, $meta, $trasaction); 
            }
            
            if ($currnet && $currnet->parent) {
                $currnet = $currnet->parent;
            } else {
                $currnet = null;
            }
        });
    }

    private function memberCommission($member, $affiliat, $amount, $meta, $trasaction)
    {
        // TODO Check paid membership
        $commission = (floatval($amount) * floatval($affiliat['percent'])) /100;
        $meta['affiliate_lavel'] = $affiliat['lavel'];
        $meta['affiliate_percentage'] = $affiliat['percent'];
        $member->creditTransaction(Transaction::BALANCE, 'affiliate_commission', $commission, $meta, $trasaction);
    }
}
