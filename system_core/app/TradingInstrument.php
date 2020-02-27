<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TradingInstrument extends Model
{
    public $timestamps = false;
    
    public function brokers ()
    {
        return $this->belongsToMany(Broker::class, 'broker_trading_instrument', 'trading_instrument_id', 'broker_id');
    }
}
