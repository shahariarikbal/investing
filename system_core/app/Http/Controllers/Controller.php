<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function serviceStringToNameSpace($service)
    {
        return 'App\\' . str_replace(' ', '', ucwords(str_replace('-', ' ', $service)));
    }
    protected function faqStringToNameSpace($faq)
    {
        return 'App\\' . str_replace(' ', '', ucwords(str_replace('-', ' ', $faq)));
    }
}
