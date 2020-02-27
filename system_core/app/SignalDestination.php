<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SignalDestination extends Model
{
    protected $guarded = [];

    public function subscription()
    {
        return $this->belongsTo(\App\Subscription::class, 'subscription_id', 'id');
    }
}
