<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SeoOptimize extends Model
{
    protected $guarded = [];


    /**
     * Get all of the owning optimizable models
     */
    public function optimizable()
    {
        return $this->morphTo();
    }
}
