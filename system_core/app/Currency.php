<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Currency extends Model
{
    use SoftDeletes;

    protected $guarded = [];
    
    public function signals()
    {
        return $this->belongsTo(Signal::class, 'id', 'currency_id');
    }

    public function marker_sentiments()
    {
        return $this->hasOne(MarketSentiment::class);
    }
}
