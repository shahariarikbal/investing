<?php

namespace App\Http\Controllers\Frontend;

use App\Blog;
use App\Broker;
use Butschster\Head\Facades\Meta;

class HomeController extends FrontendController
{
    public function index()
    {
        Meta::prependTitle('Home');

        $brokers = Broker::with([
                                'country',
                                'broker_types',
                                'payment_options',
                                'regulatory_authorities',
                                'trading_platforms',
                                'spread_types',
                                'trading_instruments'])
                                ->where('status', 1)
                                ->orderBy('premium', 'desc') // premium broker comes first
                                ->orderBy('order', 'asc')
                                ->get();

                                //return $brokers;
        return view('frontend.home.index', compact(['brokers']));
    }
}
