<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $fillable = ['key', 'ip'];

    public function likeable()
    {
        return $this->morphTo();
    }
}
