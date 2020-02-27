<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoginAttempt extends Model
{
    public function user()
    {
        return $this->morphTo();
    }
}
