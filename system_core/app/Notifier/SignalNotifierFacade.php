<?php

namespace App\Notifiers;

use Illuminate\Support\Facades\Facade;

class SignalNotifierFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'SignalNotifier';
    }
}