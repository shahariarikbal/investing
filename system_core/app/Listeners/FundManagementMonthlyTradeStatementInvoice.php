<?php

namespace App\Listeners;

use Carbon\Carbon;
use Fxtutor\Wallet\Invoice;
use Fxtutor\Wallet\Affiliate;
use App\MonthlyTradeStatement;
use Fxtutor\Wallet\Transaction;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Mail\FundManagementPaidInvoiceEmail;
use App\Mail\FundManagementOverdueInvoiceEmail;
use App\Events\FundManagementMonthlyTradeStatementInvoiceEvent;

class FundManagementMonthlyTradeStatementInvoice implements ShouldQueue
{

    public $addDays = 10;

    /**
     * Handle the event
     *
     * @param FundManagementMonthlyTradeStatementInvoiceEvent $event
     * @return void
     */
    public function handle(FundManagementMonthlyTradeStatementInvoiceEvent $event)
    {
        $statement = $event->statement;
        if ( !$statement->status) {
            return;
        }

        $transection = $statement->transaction;

        $invoice = Invoice::unpaid()->where('resource_id', $statement->id)->where('resource_type', MonthlyTradeStatement::class)->orderBy('due_date', 'desc');
        $invoice = $invoice->first();
   
        if (!$invoice) {
            $invoice = new Invoice;
            $invoice->setPayableAmount($statement->meta['company_share']);
            $invoice->tradeStatement($statement);
            $invoice->name = 'monthly trade statement';
            $invoice->member_id = $statement->member_id;
            $invoice->due_date = Carbon::now()->addDays($this->addDays);
            $invoice->save();

            return $invoice;
        }
        

        if ($transection && $transection->created_at->isToday()) {
            $invoice->transaction_id = $transection->id;
            $invoice->paidDate();
            // $invoice->dueDate($this->addDays);
            $invoice->status = Invoice::STATUS_PAID;
            if (isset($transection->meta['discount_rate']) && is_array($transection->meta['discount_rate']) ) {
                $invoice->discount($transection->meta['discount_rate']);
            }
        }

        $invoice->save();

        if($invoice->status === 'Paid') {
            // invoice paid notification
            $subject = str_replace("App\\", "", $statement->service) . ' monthly trade statement invoice charged successful';
            Mail::to($statement->member->email)->send(new FundManagementPaidInvoiceEmail($subject, $statement, $invoice));
            
            // affiliate distribution
            $affiliats = isset($statement->package->settings['affiliate']) ? $statement->package->settings['affiliate'] : null;
            $enableAffiliate = isset($statement->package->settings['enable_affiliate']) ? $statement->package->settings['enable_affiliate']: null;
           
            if (!$enableAffiliate || !$statement->status) {
                return;
            }
            
            $alreadyPaid = Transaction::where('action', 'affiliate_commission')
                                        ->where('resource_type', Transaction::class)
                                        ->where('resource_id', $transection->id)->exists();

            if ($alreadyPaid) {
                return;
            }

            if (!empty($transection->meta['total'])) {
                $amount = $transection->meta['total'];
            } else {
                $amount = $transection->amount;
            }
            
            $depth = sizeof($affiliats);
    
            $members = Affiliate::getParentsTree($statement->member, $depth);
            $currnet = $members->parent;
            $meta = [
                'ref_member_id' => $members->id,
                'member_name' => $members->full_name,
                'plan_id' => $statement->package->id,
                'service' => $statement->package->service,
                'amount' => $amount
            ];
            $self = $this;
    
            return collect($affiliats)->sortBy('lavel')->each(function ($a) use (&$currnet, $self, $amount, $meta, $transection) {
                if ($currnet) {
                    $self->memberCommission($currnet, $a, $amount, $meta, $transection); 
                }
                
                if ($currnet && $currnet->parent) {
                    $currnet = $currnet->parent;
                } else {
                    $currnet = null;
                }
            });
            // end of affiliate

        } elseif ($invoice->status === 'Unpaid' || $invoice->status === 'Overdue') {
            $invoice = $invoice->markOverdue();
            // over due notification
            $subject = str_replace("App\\", "", $statement->service) . ' monthly trade statement invoice overdued';
            Mail::to($statement->member->email)->send(new FundManagementOverdueInvoiceEmail($subject, $statement, $invoice));
        } 
        
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
