<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MarketSentiment extends Model
{
    protected $guarded = [];

    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }
}
