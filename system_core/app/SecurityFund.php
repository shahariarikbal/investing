<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SecurityFund extends Model
{
    protected $guarded = [];

    const STATUS_UNAPPROVE = 1;
    const STATUS_ACTIVE = 2;
    const STATUS_WITHDRAW = 3;
    const STATUS_FORFEIT = 4;

    public static $status = [
        'unapprove' => 1,
        'active' => 2,
        'withdraw'   => 3,
        'forfeit' => 4,
    ];
    
    /**
    * The attributes that should be cast to native types.
    *
    * @var array
    */
    protected $casts = [
        'amount' => 'double',
        'meta' => 'array'
    ];

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

    public function subscription()
    {
        return $this->belongsTo(\Fxtutor\Wallet\Subscription::class, 'subscription_id', 'id');
    }
}
