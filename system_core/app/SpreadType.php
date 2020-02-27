<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SpreadType extends Model
{
    public $timestamps = false;
    
    public function brokers ()
    {
        return $this->belongsToMany(Broker::class, 'broker_spread_type', 'spread_type_id', 'broker_id');
    }
}
