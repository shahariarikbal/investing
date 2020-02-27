<?php

namespace Fxtutor\Wallet;

use App\Member;
use App\Traits\EmailLog;
use Fxtutor\Wallet\Traits\Resource;
use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
    use Resource, EmailLog;
    
    CONST UNAPPROVED = 1;
    CONST APPROVED = 2;
    CONST CANCEL = 3;
    CONST ERROR = 4;
    
    protected $fillable = [
        'method',
        'member_id',
        'amount',
        'process_fee',
        'tax',
        'currency',
        'payment_id',
        'meta',
        'total',
        'status'
    ];


    public static $status = [
        '1' => 'unapproved',
        '2' => 'approved',
        '3' => 'cencel',
        '4' => 'error',
    ];

    protected $casts = [
        'amount' => 'float',
        'process_fee' => 'float',
        'tax' => 'float',
        'total' => 'float',
        'meta' => 'array',
    ];


    public function getStatusAttribute($value)
    {
        if (array_key_exists($value, self::$status)) {
            return self::$status[$value];
        }
    }

    public function setStatusAttribute($value)
    {
        $value = strtolower($value);
        $key = array_search($value, self::$status);

        if (array_key_exists($value, self::$status)) {
            $this->attributes['status'] = $value;
        } else {
            $this->attributes['status'] = $key;
        }
    }

    
    // Relationship

    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }
}
