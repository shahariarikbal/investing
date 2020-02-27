<?php

namespace App\Traits;

trait LoginAttempt
{
    public function LoginAttempts()
    {
        return $this->morphMany('App\LoginAttempt', 'user');
    }
}
