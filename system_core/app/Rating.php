<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $guarded = [];
    
    public function rateable()
    {
        return $this->morphTo();
    }
}
