<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BrokerType extends Model
{
    protected $guarded = [];
    
    public $timestamps = false;
    
    public function brokers ()
    {
        return $this->belongsToMany(Broker::class, 'broker_broker_type', 'broker_type_id', 'broker_id');
    }
}
