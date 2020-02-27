<?php

namespace Fxtutor\Wallet;

use App\Member;
use Illuminate\Database\Eloquent\Model;
use Fxtutor\Wallet\Traits\TransactionId;

class Transaction extends Model
{
    use TransactionId;

    const CREDIT = 1;
    const DEBIT = 2;

    const BALANCE = 1;
    const RESTRICTED = 2;
    const INREVIEW = 3;
    const PENDING = 4;
    const SECURITY = 5;

    public static $balanceTypes = [
        1 => 'balance',
        2 => 'restricted',
        3 => 'inreview',
        4 => 'pending',
        5 => 'security'
    ];

    protected $fillable = [
        'action',
        'member_id',
        'balance_type',
        'invoice',
        'amount',
        'currency',
        'balance',
        'type',
        'resource_type',
        'resource_id',
        'meta',
    ];

    protected $appends = ['transaction_id'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'amount' => 'double',
        'balance' => 'double',
        'meta' => 'array'
    ];

    static $type = [
        '1' => 'credit',
        '2' => 'debit'
    ];

    /**
     * Scope a query to only include popular users.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopePublic($query)
    {
        return $query->where('balance_type', self::BALANCE);
    }

    public function newQuery($except_deleted = true)
    {
        return parent::newQuery($except_deleted)->orderBy('id', 'desc');
    }

    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    public function deposit()
    {
        return $this->belongsTo(Deposit::class);
    }

    public function resource()
    {
        return $this->morphTo();
    }

    public function getBalanceTypeAttribute($value)
    {
        if (array_key_exists($value, self::$balanceTypes)) {
            return self::$balanceTypes[$value];
        }
    }

    public function getTypeAttribute($value)
    {
        if (array_key_exists($value, self::$type)) {
            return self::$type[$value];
        }
    }

    public function setTypeAttribute($value)
    {
        $value = strtolower($value);
        $key = array_search($value, self::$type);

        if (array_key_exists($value, self::$type)) {
            $this->attributes['type'] = $value;
        } else {
            $this->attributes['type'] = $key;
        }
    }
}
