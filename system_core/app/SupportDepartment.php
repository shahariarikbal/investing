<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SupportDepartment extends Model
{
    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}
