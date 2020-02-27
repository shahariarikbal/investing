<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected static $status = [
        1 => 'open', 2 => 'answered', 3 => 'closed', 4 => 'resolved'
    ];
}
