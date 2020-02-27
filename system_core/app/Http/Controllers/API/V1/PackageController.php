<?php

namespace App\Http\Controllers\API\V1;

use App\FAQ;
use App\Package;
use App\Copytrade;
use App\Subscription;
use Fxtutor\Wallet\Plan;
use App\PerformanceGraph;
use Illuminate\Http\Request;

// use Exception;

class PackageController extends ApiController
{

    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index($service)
    {
        return Plan::whereService('App\\'.$service)->whereStatus(true)->orderBy('orders')->get();
    }

}
