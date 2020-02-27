<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TradingPlatform extends Model
{
    public $timestamps = false;
    
    public function brokers ()
    {
        return $this->belongsToMany(Broker::class, 'broker_trading_platform', 'trading_platform_id', 'broker_id');
    }
}
