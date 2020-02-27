<?php

namespace Fxtutor\Wallet;

use Illuminate\Database\Eloquent\Model;
use App\Member;
use App\Traits\EmailLog;

class Withdraw extends Model
{
    use EmailLog;
    
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
        '3' => 'cancel',
        '4' => 'error',
    ];

    protected $casts = [
        'amount' => 'float',
        'process_fee' => 'float',
        'tax' => 'float',
        'total' => 'float',
        'meta' => 'array',
    ];

    public function member()
    {
        return $this->belongsTo(Member::class);
    }

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
}
