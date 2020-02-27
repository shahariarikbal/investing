<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PressRelease extends Model
{
    protected $guarded = [];

    public function broker()
    {
        return $this->belongsTo(Broker::class, 'id', 'broker_id');
    }
}
