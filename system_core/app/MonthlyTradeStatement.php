<?php

namespace App;

use Exception;
use App\Traits\EmailLog;
use Fxtutor\Wallet\Plan;
use Fxtutor\Wallet\Invoice;
use Fxtutor\Wallet\Transaction;
use Fxtutor\Wallet\Traits\Resource;
use Illuminate\Database\Eloquent\Model;

class MonthlyTradeStatement extends Model
{
    use EmailLog, Resource;
    
    protected $guarded = [];

    protected $appends = ['month', 'year'];

    protected $casts = [
        'date' => 'datetime:Y-m-d',
        'meta' => 'array'
    ];

    /**
     * Get invoice that owns the trade statement.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function invoice()
    {
        return $this->morphOne(Invoice::class, 'resource');
    }

    /**
     * 
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function transaction()
    {
        return $this->BelongsTo(Transaction::class, 'payment_id');
    }

    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    public function package()
    {
        return $this->belongsTo(Plan::class);
    }

    public function getMonthAttribute()
    {
        return $this->date ? $this->date->format('F') : null;
    }

    public function getYearAttribute()
    {
        return $this->date ? $this->date->format('Y') : null;
    }

    public function charge()
    {
        // charge $this->meta['company_share'] amount
        $price = $this->meta['company_share'];
        if (!$this->member->hasBalance($price)) {
            // return $this->invoice->markOverdue();
            throw new Exception("You have not enough balance to pay monthly trade statement invoice");
        }

        // {"plan_id":"3","service":"App\\FundManagement","payment_method":null,"ends_at":"2020-08-23T15:53:03.000000Z","total":700}
        // $meta = $this->invoice->toArray();
        $meta = [
            "service" => FundManagement::class,
            "payment_method" => "wallet",
            "total" => $price,
            "package" => $this->package->name,
            "month" => $this->month,
            "year" => $this->year
        ];

        $transection = $this->member->debitTransaction(Transaction::BALANCE, "monthly_trade_statement_invoice_charge", $price, $meta, $this);

        if ( !$transection ) {
            // return $this->invoice->markOverdue();
            throw new Exception("Transection can't create.");
        }

        $this->payment_id = $transection->id;
        $this->save();
        return $this->invoice;
        \Log::debug($transection);
        // make status paid
        // return $this->invoice->paidDate($transection->id);
    }
}
