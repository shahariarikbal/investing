<?php

namespace App\Http\Controllers\Frontend;

use App\Broker;
use App\CountryParameter;
use Illuminate\Http\Request;
use Butschster\Head\Facades\Meta;
use App\Http\Controllers\Controller;
use App\PaymentOption;
use App\RegulatoryAuthority;
use App\TradingPlatform;

class ForexBrokerController extends FrontendController
{
    public function brokerSelectionGuide()
    {
        return view('frontend.forex.selection-guide');
    }

    public function index()
    {
        Meta::prependTitle('Forex Broker');

        if (request()->wantsJson()) {
            $broker = Broker::select(['id','name'])->get();
            if (request()->has('brokers')) {
                $brokers = explode(',', request()->brokers);
                $broker = Broker::with(['country',
                                        'published_ratings',
                                        'broker_types',
                                        'payment_options',
                                        'regulatory_authorities',
                                        'trading_platforms',
                                        'spread_types',
                                        'trading_instruments'])->whereIn('slug', $brokers)->get();

//                if (!request()->has('all')) {
//                    $broker = Broker::with(['country',
//                                            'broker_types',
//                                            'payment_options',
//                                            'regulatory_authorities',
//                                            'trading_platforms',
//                                            'spread_types',
//                                            'trading_instruments'])->get();
//                }
            }
            
            return $broker;
        }
        
        
       $brokers = Broker::with([
                            'country',
                            'published_ratings',
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
        return view('frontend.forex.forex-broker', compact('brokers'));
    }

    public function categoryParameters(Request $request)
    {
        if($request->wantsJson()) {
            return response()->json([
                                        [
                                            'label' => 'Swap Free',
                                            'key' => 'swap_free',
                                            'slug' => 'swap_free',
                                            'quickDisplay' => true
                                        ],
                                        [
                                            'label' => 'ECN Broker',
                                            'key' => 'ecn_broker',
                                            'slug' => 'ecn_broker',
                                            'quickDisplay' => true
                                        ],
                                        [
                                            'label' => 'STP Broker',
                                            'key' => 'stp_broker',
                                            'slug' => 'stp_broker'
                                        ],
                                        [
                                            'label' => 'Market Maker Broker',
                                            'key' => 'mm_broker',
                                            'slug' => 'mm_broker'
                                        ],
                                        [
                                            'label' => 'Deposit Bonus',
                                            'key' => 'deposit_bonus',
                                            'slug' => 'deposit_bonus',
                                            'quickDisplay' => true
                                        ],
                                        [
                                            'label' => 'No Deposit Bonus',
                                            'key' => 'no_deposit_bonus',
                                            'slug' => 'no_deposit_bonus'
                                        ],
                                        [
                                            'label' => 'First Deposit Bonus',
                                            'key' => 'first_deposit_bonus',
                                            'slug' => 'first_deposit_bonus'
                                        ],
                                        [
                                            'label' => 'Low Spread Broker',
                                            'key' => 'low_spread_broker',
                                            'slug' => 'low_spread_broker',
                                            'quickDisplay' => true
                                        ],
                                        [
                                            'label' => 'Scalping Broker',
                                            'key' => 'scalping_broker',
                                            'slug' => 'scalping_broker'
                                        ],
                                        [
                                            'label' => 'Hedging Broker',
                                            'key' => 'hedging_broker',
                                            'slug' => 'hedging_broker'
                                        ],
                                        [
                                            'label' => 'PAMM/MAM Account',
                                            'key' => 'pamm_mam_account',
                                            'slug' => 'pamm_mam_account'
                                        ],
                                        [
                                            'label' => 'USA Client Broker',
                                            'key' => 'usa_client_broker',
                                            'slug' => 'usa_client_broker',
                                            'quickDisplay' => true
                                        ],
                                        [
                                            'label' => 'High Leverage Broker',
                                            'key' => 'high_leverage_broker',
                                            'slug' => 'high_leverage_broker'
                                        ],
                                        [
                                            'label' => 'Trading Signal',
                                            'key' => 'trading-signal',
                                            'slug' => 'trading-signal'
                                        ],
                                        [
                                            'label' => 'Interest On Margin',
                                            'key' => 'interest_on_margin',
                                            'slug' => 'interest_on_margin'
                                        ],
                                        [
                                            'label' => 'Charting Package',
                                            'key' => 'charting_package',
                                            'slug' => 'charting_package'
                                        ],
                                        [
                                            'label' => 'Market Commentary',
                                            'key' => 'market_commentary',
                                            'slug' => 'market_commentary'
                                        ],
                                        [
                                            'label' => 'High Rated Broker',
                                            'key' => 'high_rated_broker',
                                            'slug' => 'high_rated_broker',
                                            'quickDisplay' => true
                                        ]
                                ]);
        }
        abort(403);
    }

    public function regulationParameters(Request $request)
    {
        $regulatoryAuthority = RegulatoryAuthority::select(['name as label', 'id as key', 'slug', 'quick_display as quickDisplay'])->get();
    
        if($request->wantsJson()) {
            return response()->json($regulatoryAuthority);
        }
        abort(403);
    }

    public function countries(Request $request)
    {
        $countryParameter = CountryParameter::select(['countries.code as key', 'countries.name as label', 'countries.code as slug', 'country_parameters.quick_display as quickDisplay'])
                        ->join('countries', 'countries.code', 'country_parameters.country_code')->get();
        if($request->wantsJson()) {
            return response()->json($countryParameter);
        };
        abort(403);
    }

    public function paymentMethodParameters(Request $request)
    {
        $paymentOption = PaymentOption::select(['name as label', 'id as key', 'slug', 'quick_display as quickDisplay'])->get();

        if($request->wantsJson()) {
            return response()->json($paymentOption);
        }
        abort(403);
    }

    public function tradingPlatformParameters(Request $request)
    {
        $tradingPlatform = TradingPlatform::select(['name as label', 'id as key', 'slug', 'quick_display as quickDisplay'])->get();

        if($request->wantsJson()) {
            return response()->json($tradingPlatform);
        }
        abort(403);
    }

    public function show(Request $request, Broker $broker)
    {
        if(!$broker->status) {
            abort(404);
        }
        $broker = Broker::with(['country',
                                'broker_types',
                                'published_ratings.model',
                                'payment_options',
                                'regulatory_authorities',
                                'trading_platforms',
                                'spread_types',
                                'trading_instruments',
                                'videos',
                                'press_releases'])->find($broker->id);
    
        if ($request->wantsJson()) {
            return $broker;
        }

        return view('frontend.forex.details', compact('broker'));
    }

    public function compare(Request $request) {
        if ($request->has('brokers')) {
            
            $brokers = explode(',', request()->brokers);
            $broker = Broker::select(['name'])->whereIn('slug', $brokers)->get();

            $title = 'Comparison Between: ';
            foreach($broker as $item) {
                $title .= $item->name . ' & ';
            }
            $title = trim($title, ' & ');
            $title .=  ' | ' . env('APP_NAME');

            $description = 'InvestingPartnar provides an awesome solution to search/ filter forex broker, by considering several features like, broker type, regulatory authority, payment method, country, trading instruments. Here we have compare service between two to three brokers to understand which broker is best for...';

            return view('frontend.forex.compare', compact(['broker','title', 'description']));
        }
        
        abort(404);
        
    }
}
