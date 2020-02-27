<?php

namespace App\Notifiers;

use Illuminate\Support\Facades\Facade;

class MonthlyTradeStatementNotifierFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'MonthlyTradeStatementNotifier';
    }
}