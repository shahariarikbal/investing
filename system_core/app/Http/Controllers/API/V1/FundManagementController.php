<?php

namespace App\Http\Controllers\API\V1;

use App\FAQ;
use App\Shout;
use App\Copytrade;
use App\FundManagement;
use App\MonthlyTradeStatement;
use App\PerformanceGraph;
use Illuminate\Http\Request;
use Fxtutor\Wallet\Subscription;

// use Exception;

class FundManagementController extends ApiController
{

    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function subscription(Request $request)
    {
        $subscriptions = Subscription::with(['plan', 'transaction', 'securityFund'])
                                        ->where('service', 'App\FundManagement')
                                        ->where('member_id', $request->user()->id)->get();
        
        return response()->json($subscriptions, 200);
    }

    public function performanceGraph(Request $request)
    {
        return $graphs = PerformanceGraph::select('date as x', 'value as y')
                                    ->whereService(FundManagement::class)
                                    ->where('package_id', $request->package_id)
                                    ->where('member_id', $request->user()->id)
                                    ->orderBy('date', 'ASC')
                                    ->get();

        return response()->json($graphs, 200);
    }

    public function shouts(Request $request)
    {
        $shouts = Shout::select(['title', 'description', 'updated_at'])->whereService(FundManagement::class)->get();

        return response()->json($shouts, 200);
    }

    public function monthlyTradeStatement(Request $request)
    {
        return $statements = MonthlyTradeStatement::whereService(FundManagement::class)
                                                    ->where('package_id', $request->package_id)
                                                    ->where('member_id', $request->user()->id)
                                                    ->orderBy('date', 'DESC')
                                                    ->get();
        // return $graphs = PerformanceGraph::select('date as x', 'value as y')
        //                             ->whereService(FundManagement::class)
        //                             ->where('package_id', $request->package_id)
        //                             ->where('member_id', $request->user()->id)
        //                             ->orderBy('date', 'ASC')
        //                             ->get();

        return response()->json($statements, 200);
    }

}
