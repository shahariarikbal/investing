<?php

namespace App\Interaction;

use Illuminate\Support\Facades\Facade;

class InteractionFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'Interaction';
    }
}