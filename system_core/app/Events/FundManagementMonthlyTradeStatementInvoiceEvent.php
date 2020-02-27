<?php

namespace App\Events;

use App\MonthlyTradeStatement;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class FundManagementMonthlyTradeStatementInvoiceEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $statement;

    /**
     * retister data
     *
     * @param MonthlyTradeStatement $statement
     */
    public function __construct(MonthlyTradeStatement $statement)
    {
        $this->statement = $statement;
    }
}
