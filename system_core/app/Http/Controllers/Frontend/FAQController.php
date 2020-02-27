<?php

namespace App\Http\Controllers\Frontend;

use App\FAQ;
use Illuminate\Http\Request;
use Butschster\Head\Facades\Meta;
use App\Http\Controllers\Controller;

class FAQController extends FrontendController
{
    public function index()
    {
        Meta::prependTitle('FAQ');

        $faqs = FAQ::where('service', 'App\General')->get()->toArray();

        $signal_faqs = count($faqs) > 0 ? array_chunk( $faqs, ceil(count($faqs)/2) ) : [];
        
        return view('frontend.faq.faq', compact('signal_faqs'));
    }
}
