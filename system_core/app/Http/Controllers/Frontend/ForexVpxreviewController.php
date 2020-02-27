<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

class ForexVpxreviewController extends FrontendController
{
    public function index()
    {
        return view('frontend.vps.forex-vps');
    }
}
