<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class BrokerVideo extends Model
{

    protected $guarded = [];



    /*
    |--------------------------------------------------------------------------
    | Relationship
    |--------------------------------------------------------------------------
    */

    public function broker()
    {
        return $this->belongsTo(Broker::class, 'id', 'broker_id');
    }
}
