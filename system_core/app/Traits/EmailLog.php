<?php

namespace App\Traits;

use App\EmailLogs;

trait EmailLog
{
    public function emailLogs()
    {
        return $this->morphMany(EmailLogs::class, 'resource');
    }
}