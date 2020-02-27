<?php

namespace App\Http\Controllers\Frontend;

use App\Package;
use Illuminate\Http\Request;
use Butschster\Head\Facades\Meta;
use App\Http\Controllers\Controller;

class ForexConsultancyController extends FrontendController
{
    public function index()
    {
        Meta::prependTitle('Forex Consultancy');
        $forexConsultancytPackages = Package::whereService('App\ForexConsultancy')->whereStatus(1)->orderBy('orders', 'ASC')->get();
        return view('frontend.fx-consultancy', compact('forexConsultancytPackages'));
    }
}
