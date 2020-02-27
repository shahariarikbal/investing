<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Butschster\Head\Facades\Meta;
use App\Http\Controllers\Controller;

class AboutUsController extends FrontendController
{
    public function index()
    {
        Meta::prependTitle('About Us');
        return view('frontend.about.about');
    }
}
