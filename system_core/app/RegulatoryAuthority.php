<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RegulatoryAuthority extends Model
{
    public $timestamps = false;
    
    public function brokers ()
    {
        return $this->belongsToMany(Broker::class, 'broker_regulatory_authority', 'regulatory_authority_id', 'broker_id');
    }
}
