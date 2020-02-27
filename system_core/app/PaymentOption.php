<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentOption extends Model
{
    public $timestamps = false;

    protected static $types = [
        1 => 'deposit',
        2 => 'withdraw'
    ];

    public static function type($type)
    {
        if ($key = array_search($type, self::$types)) {
            return $key;
        }
        throw new \Exception('Your given type is\'t in the array.');
    }

    public function getTypeAttribute($value)
    {
        if (array_key_exists($value, self::$types)) {
            return self::$types[$value];
        }

    }

    // public function setTypeAttribute($value)
    // {
    //     dd($value);
    //     $this->attributes['type'] = array_search($value, self::$types);
    // }

    
    public function brokers ()
    {
        return $this->belongsToMany(Broker::class, 'broker_payment_option', 'payment_option_id', 'broker_id');
    }
}
