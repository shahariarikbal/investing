<?php

namespace App\Http\Controllers\Frontend;

use App\FAQ;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SignalFaqController extends FrontendController
{
    public function index()
    {
        $faqs = FAQ::where('service', 'App\Signal')->active()->get()->toArray();
       
        $signal_faqs = count($faqs) > 0 ? array_chunk( $faqs, ceil(count($faqs)/2) ) : [];
        
        return view('frontend.signal.signal-faq', compact('signal_faqs'));
    }
}
