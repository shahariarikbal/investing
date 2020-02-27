<?php

namespace App\Http\Controllers\API\V1;

use App\FAQ;
use App\Copytrade;
use App\PerformanceGraph;
use Illuminate\Http\Request;
use Fxtutor\Wallet\Subscription;

// use Exception;

class CopytradeController extends ApiController
{

    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function subscription(Request $request)
    {
        $subscriptions = Subscription::with(['plan'])
                                        ->where('service', 'App\Copytrade')
                                        ->where('member_id', $request->user()->id)->get();
        
        return response()->json($subscriptions, 200);
    }

    public function performanceGraph(Request $request)
    {
        $graphs = PerformanceGraph::select(['date as x', 'value as y'])
                                    ->whereService(Copytrade::class)
                                    ->where('package_id', $request->package_id)
                                    ->orderBy('date', 'ASC')
                                    ->get();

        return response()->json($graphs, 200);
    }

    public function faq(Request $request)
    {
        $faqs = FAQ::select(['question', 'answer'])->whereService(Copytrade::class)->get();
        $chunk = ceil($faqs->count() / 2);
        $faqs = $faqs->chunk($chunk);

        return response()->json($faqs, 200);
    }

}
