<?php

namespace App\Console\Commands;

use App\Events\FundManagementMonthlyTradeStatementInvoiceEvent;
use Exception;
use Carbon\Carbon;
use Fxtutor\Wallet\Invoice;
use App\MonthlyTradeStatement;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class MonthlyTradeStatementChargeDueInvoice extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'monthly-trade-statement:charge-due-invoice';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'charge due invoice today that are generated due to monthlty trade statement creation or/and activation';

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
        // find due invoice list which due date is today
        $statements = MonthlyTradeStatement::with([
            'invoice' => function ($query) {
                $query->whereIn('status', [Invoice::STATUS_UNPAID, Invoice::STATUS_OVERDUE])
                    ->where(function ($q) {
                        $q->whereDate('due_date', '<=', Carbon::now());
                    });
            }
        ])
        ->whereHas('invoice', function ($query) {
            $query->whereIn('status', [Invoice::STATUS_UNPAID, Invoice::STATUS_OVERDUE])
                ->where(function($q) {
                    $q->whereDate('due_date', '<=', Carbon::now());
                });
        })
        ->get();

        // charge due invoice
        $statements->each(function ($statement) {
            try {
                $invoice = $statement->charge();
            } catch (Exception $exception) {
                // \Log::debug(['exception' => $exception, 'statement' => $statement]);
            }
            event(new FundManagementMonthlyTradeStatementInvoiceEvent($statement));
        });
    }
}
