<?php

namespace Fxtutor\Wallet;

use App\MonthlyTradeStatement;
use App\Traits\EmailLog;
use Carbon\Carbon;
use PDF;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{

    use EmailLog;

    /**
     * These constants are possible representations of the status field.
     */
    const STATUS_UNPAID = 1;
    const STATUS_PAID   = 2;
    const STATUS_CANCEL = 3;
    const STATUS_OVERDUE = 4;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'member_id',
        'items',
        'resource_id',
        'resource_type',
        'transaction_id',
        'status',
        'due_date',
        'paid_date',
        'meta'
    ];

    public static $status = [
        'unpaid' => 1,
        'paid'   => 2,
        'cencel' => 3,
        'overdue' => 4
    ];

    protected $dates = [
        'due_date',
        'paid_date',
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'items' => 'array',
        'meta' => 'array'
    ];

    protected $appends = [
        'sub_total_price',
        'discount_price',
        'after_discount_price',
        'tax_price',
        'total_price',
        'have_image',
        'note'
    ];

    public $payable_amount = 0;

    public function resource()
    {
        return $this->morphTo();
    }

    public function getStatusAttribute($value)
    {
        $key = array_search($value, self::$status);
       
        if ($key) {
            return ucfirst($key);
        }
    }

    public function setStatusAttribute($value)
    {
        $value = strtolower($value);
        $key = array_search($value, self::$status);

       if ($key) {
            $this->attributes['status'] = $value;
       } else {
            $this->attributes['status'] = self::$status[$value];
       }
    }

    public function getItemsAttribute($value)
    {
        return Collection::make(json_decode($value));
    }


    public function getNoteAttribute() {
        return isset($this->meta['note'])? $this->meta['note'] :null;
    }

    public function scopePaid($query)
    {
        $query->where('status', self::$status['paid']);
    }

    public function scopeUnpaid($query)
    {
        $query->where('status', self::$status['unpaid']);
    }

    /**
     * Filter query by past due.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return void
     */
    public function scopePastDue($query)
    {
        $query->where('due_date', '<', Carbon::now());
    }
   
    /**
     * Adds an item to the invoice.
     *
     * @method addItem
     *
     * @param string $name
     * @param int    $price
     * @param int    $ammount
     * @param string $id
     * @param string $imageUrl
     *
     * @return self
     */
    public function addItem($name, $price, $ammount = 1, $id, $imageUrl = null)
    {
        
        $this->items = $this->items->push([
            'name'     => $name,
            'price'    => $price,
            'quantity' => $ammount,
            'total'    => number_format(bcmul($price, $ammount, config('invoice.decimals')), config('invoice.decimals')),
            'id'       => $id,
            'image' => $imageUrl,
        ])->all();

        return $this;
    }

    /**
     * Pop the last invoice item.
     *
     * @method popItem
     *
     * @return self
     */
    public function popItem()
    {
        $this->items->pop();
        $this->items = $this->items->all();
        return $this;
    }

    /**
     * Return the subtotal invoice price.
     *
     * @method subTotalPrice
     *
     * @return int
     */
    private function subTotalPrice()
    {
        return $this->items->sum(function ($item) {
            return bcmul($item->price, $item->quantity, config('invoice.decimals'));
        });
    }

    /**
     * Return Attribute sub total price.
     *
     * @method subTotalPriceAttribute
     *
     * @return int
     */
    public function getSubTotalPriceAttribute()
    {
        return number_format($this->subTotalPrice(), config('invoice.decimals'));
    }

    /**
     * set discount rate for this invoice
     *
     * @param Object $discount_rate
     * @return void
     */
    public function discount(Object $discount_rate)
    {
        $this->meta = array_merge($this->meta?: [], ['discount' => $discount_rate]);
        return $this;
    }

     /**
     * get discount Price.
     *
     * @method discountPrice
     *
     * @return float
     */
    private function discountPrice()
    {
        $discount_rate = isset($this->meta['discount']) ? $this->meta['discount'] : null;

        if (is_null($discount_rate)) {
            $discountT = 0;
            foreach(config('invoice.discount_rates') as $discount){
                if ($discount['type'] == 'percentage') {
                    $discountT += bcdiv(bcmul($discount['rate'], $this->subTotalPrice(), config('invoice.decimals')), 100, config('invoice.decimals'));
                    continue;
                }
                $discountT += $discount['rate'];
            }
            return $discountT;
        }
        if ($discount_rate['type'] == 'percentage') {
            return bcdiv(bcmul($discount_rate['rate'], $this->subTotalPrice(), config('invoice.decimals')), 100, config('invoice.decimals'));
        }

        return $discount_rate['rate'];
    }

    /**
     * Return Attribute discount price.
     *
     * @method getDiscountPriceAttribute
     *
     * @return int
     */
    public function getDiscountPriceAttribute()
    {
        return number_format($this->discountPrice(), config('invoice.decimals'));
    }

    /**
     * return subtotal after discount
     *
     * @return int
     */
    private function afterDiscountPrice()
    {
        return bcsub($this->subTotalPrice(), $this->discountPrice(), config('invoice.decimals'));
    }

    public function getAfterDiscountPriceAttribute()
    {
        return number_format($this->afterDiscountPrice(), config('invoice.decimals'));
    }

    /**
     * set tax rate 
     *
     * @param Object $tax_rate
     * @return Invoice
     */
    public function tax(Object $tax_rate)
    {
        $this->meta = array_merge($this->meta?: [], ['tax' => $tax_rate]) ;
        return $this;
    }
    /**
     * taxPrice.
     *
     * @method taxPrice
     *
     * @return float
     */
    private function taxPrice()
    {
        $tax_rate = isset($this->meta['tax'])? $this->meta['tax']: null;
        if (is_null($tax_rate)) {
            $tax_total = 0;
            foreach(config('invoice.tax_rates') as $taxe){
                if ($taxe['tax_type'] == 'percentage') {
                    $tax_total += bcdiv(bcmul($taxe['tax'], $this->afterDiscountPrice(), config('invoice.decimals')), 100, config('invoice.decimals'));
                    continue;
                }
                $tax_total += $taxe['tax'];
            }
            return $tax_total;
        }
        
        if ($tax_rate['tax_type'] == 'percentage') {
            return bcdiv(bcmul($tax_rate['tax'], $this->afterDiscountPrice(), config('invoice.decimals')), 100, config('invoice.decimals'));
        }

        return $tax_rate['tax'];
    }

    /**
     * Return Attribute tax.
     *
     * @method taxPriceAttribute
     *
     * @return int
     */
    public function getTaxPriceAttribute()
    {
        return number_format($this->taxPrice(), config('invoice.decimals'));
    }

    /**
     * Return the total invoce price after aplying the tax.
     *
     * @method totalPrice
     *
     * @return int
     */
    private function totalPrice()
    {
        return bcadd($this->afterDiscountPrice(), $this->taxPrice(), config('invoice.decimals'));
    }

    /**
     * Return Attribute total price.
     *
     * @method totalPriceAttribute
     *
     * @return int
     */
    public function getTotalPriceAttribute()
    {
        return number_format($this->totalPrice(), config('invoice.decimals'));
    }

    /**
     * Return true/false if one item contains image.
     * Determine if we should display or not the image column on the invoice.
     * 
     * @method shouldDisplayImageColumn
     *
     * @return boolean
     */
    public function getHaveImageAttribute()
    {
        foreach($this->items as $item){
            if(isset($item->image) && $item->image != null){
                return true;
            }
        }

        return false;
    }

    /**
     * set invoice note for user
     *
     * @param string $note
     * @return Invoice
     */
    public function note($note)
    {
        $this->meta = array_merge($this->meta, ['note' => $note]);
        return $this;
    }
    /**
     * set invoice due date
     * if Null then due date set now
     *
     * @param int|null $days
     * @return void
     */
    public function dueDate($days = null)
    {
        if ($days) {
            $this->attributes['due_date'] =  Carbon::now()->addDays($days);
        } else {
            $this->attributes['due_date'] =  Carbon::now();
        }
        return $this;
    }

    /**
     * set invoice paid date
     * if null then paid date set now
     *
     * @param int|null $days
     * @return void
     */
    public function paidDate($days = null)
    {
        if ($days) {
            $this->attributes['paid_date'] =  Carbon::now()->addDays($days);
        } else {
            $this->attributes['paid_date'] =  Carbon::now();
        }

        return $this;
    }

    /**
     * Make paid the invoice
     * 
     * @param int $transection_id
     * @return Invoice
     */
    public function paidInvoice($transection_id)
    {
        $this->paidDate();
        $this->transaction_id = $transection_id;
        $this->status = self::STATUS_PAID;
        $this->save();
        return $this;
    }

    
    public function markOverdue()
    {
        $this->status = self::STATUS_OVERDUE;
        $this->save();
        return $this;
    }

    public function setPayableAmount($payable_amount)
    {
        return $this->payable_amount = $payable_amount;
    }

    public function tradeStatement(MonthlyTradeStatement $statement, $type='create')
    {
        $this->resource_id = $statement->id;
        $this->resource_type = MonthlyTradeStatement::class;
        if ($type === 'create') {
            $item_name = "New Monthly Trade Statement Invoice for '" .$statement->package->name. "' " . str_replace('App\\', '', $statement->service) . " plan - " . $statement->month . ", " . $statement->year;
        } else {
            $item_name = "Renew Subscription for " . str_replace('App\\', '', $statement->service);
        }
        

        $this->items = collect([Collection::make([
            'id' => $statement->id,
            'name' => $item_name,
            'price' => $this->payable_amount,
            'service' => $statement->service,
            'quantity' => 1,
        ])]);

        return $this;
    }

    public function subscription(Subscription $subscription, $type='create')
    {
        $this->resource_id = $subscription->id;
        $this->resource_type = Subscription::class;
        if ($type === 'create') {
            $item_name = "New Subscription for " . str_replace('App\\', '', $subscription->service);
        } else {
            $item_name = "Renew Subscription for " . str_replace('App\\', '', $subscription->service);
        }
        

        $this->items = collect([Collection::make([
            'id' => $subscription->id,
            'name' => $item_name,
            'price' => $this->payable_amount > 0 ? $this->payable_amount : $subscription->price,
            'service' => $subscription->service,
            'start_at' => $subscription->start_at,
            'ends_at' => $subscription->ends_at,
            'quantity' => 1,
        ])]);

        return $this;
    }

    public function generatePDF()
    {
        $this->load(['member.profile', 'subscriptionDetails.plan']);
        $data = $this->toArray();

        $pdf = PDF::loadView('pdf.invoice', $data);
        $pdf->setPaper('a4');

        return $pdf;
    }

    public function download()
    {
        $pdf = $this->generatePDF();
        
        return $pdf->download("invoice-$this->id.pdf");
    }

    public function saveInvoice($path)
    {
        $pdf = $this->generatePDF();

        return $pdf->save($path);
    }

    public function member()
    {
        return $this->belongsTo(\App\Member::class);
    }

    public function subscriptionDetails()
    {
        return $this->belongsTo(\Fxtutor\Wallet\Subscription::class, 'resource_id', 'id');
    }
}
