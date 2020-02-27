<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Shout extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    public function member()
    {
        return $this->belongsTo(Member::class);
    }
}
