<?php

namespace App;

use Fxtutor\Wallet\Subscription;
use Illuminate\Database\Eloquent\Model;

class MetaTraderAccount extends Model
{
    protected $guarded = [];

    protected static $platforms = [
        1 => 'mt4',
        2 => 'mt5'
    ];

    protected static $risk_preferances = [
        1 => 'risk_percent',
        2 => 'fixed_lot',
        3 => 'lot_multiplier',
        4 => 'same_as_master'
    ];

    public static function platform($platform)
    {
        if ($key = array_search($platform, self::$platforms)) {
            return $key;
        }
        throw new \Exception('Your given platform is\'t in the array.');
    }

    public static function risk_preferance($risk_preferance)
    {
        if ($key = array_search($risk_preferance, self::$risk_preferances)) {
            return $key;
        }
        throw new \Exception('Your given risk preferance is\'t in the array.');
    }

    public function getPlatformTypeAttribute($value)
    {
        if (array_key_exists($value, self::$platforms)) {
            return self::$platforms[$value];
        }
    }

    public function getRiskPreferanceAttribute($value)
    {
        if (array_key_exists($value, self::$risk_preferances)) {
            return self::$risk_preferances[$value];
        }
    }

    public function subscription()
    {
        return $this->belongsTo(Subscription::class, 'subscription_id', 'id');
    }

    public function broker()
    {
        return $this->hasOne(Broker::class, 'broker_id', 'id');
    }
}
