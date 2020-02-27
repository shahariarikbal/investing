<?php

namespace App\Notifiers;

use Illuminate\Support\Facades\Facade;

class PerformanceGraphNotifierFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'PerformanceGraphNotifier';
    }
}