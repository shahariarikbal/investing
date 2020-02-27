<?php

namespace App\Http\Controllers\API\V1;

use App\Signal;
use App\Currency;
use App\Copytrade;
use App\EmailLogs;
use Carbon\Carbon;
use App\PerformanceGraph;
use Illuminate\Http\Request;
use Fxtutor\Wallet\Subscription;
use Illuminate\Support\Facades\DB;

class PremiumSignalController extends ApiController
{

    protected $months = [
        'janurary',
        'february',
        'march',
        'april',
        'may',
        'june',
        'july',
        'august',
        'september',
        'october',
        'november',
        'december',
    ];

    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index(Request $request)
    {
        $user = $request->user()->id;
        $signals = Signal::join('email_logs', 'email_logs.resource_id', 'signals.id')
                        ->where('signals.status', Signal::status('active'))
                        ->where('email_logs.is_reportable', true)
                        ->where('email_logs.resource_type', 'APP\\Signal')
                        ->where('email_logs.member_id', $user)->get();

        // $signals->map(function ($signal) {
        //     if ($signal->premium || $signal->package_id) {
        //         return $signal;
        //     }
        // });
     
        // return Signal::join('email_logs', 'email_logs.resource_id', '=', 'signals.id')
                        // ->where('email_logs.resource_type', 'App\\\Signal')
                        // ->where('email_logs.member_id', $request->user()->id)
                        // ->get();
        // $signals = Signal::whereStatus(Signal::status('active'))->get();
        return response()->json($signals, 200);
    }

    public function subscription(Request $request)
    {
        $subscriptions = Subscription::with(['plan'])
                                        ->where('service', 'App\Signal')
                                        ->where('member_id', $request->user()->id)->get();
        
        return response()->json($subscriptions, 200);
    }

    public function performanceGraph(Request $request)
    {
        $user = $request->user()->id;

        $reports = [];
	
		foreach ($this->months as $key => $month) {
			$pipsGain[$month] = 0;
			$pipsLoss[$month] = 0;
            
            $monthlySignal = Signal::join('email_logs', 'email_logs.resource_id', 'signals.id')
                                    ->where('email_logs.is_reportable', true)
                                    ->where('email_logs.resource_type', 'APP\\Signal')
                                    ->where('email_logs.member_id', $user)
                                    ->whereStatus(Signal::status('filled'))
									->whereBetween('signals.updated_at', [$this->getMonthsInRange($key,'start'), $this->getMonthsInRange($key,'end')])->get();
           
            foreach ($monthlySignal as $signal) {
                if ($signal->profit) {
                    $pipsGain[$month] += $signal->pips;
                }else{
                    $pipsLoss[$month] += $signal->pips;
                }
            }
            $reports[] = [
                'month' => $this->getMonthsInRange($key, 'start'),
                'pips' => $pipsGain[$month] - $pipsLoss[$month]
            ];
		}
		
        return response()->json(json_encode($reports), 200);
    }

    protected function getMonthsInRange($index, $value)
	{
		$startDate 	= Carbon::now()->startOfYear();
		$endDate 	= Carbon::now()->endOfYear();
		$months = array();
		while (strtotime($startDate) <= strtotime($endDate)) {
			$months[] = array('start' => Carbon::parse($startDate)->startOfMonth(), 'end' => Carbon::parse($startDate)->endOfMonth(), );
			$startDate = date('Y-m-d H:i:s', strtotime($startDate.
				'+ 1 month'));
		}

		return $months[$index][$value];
    }
    
    public function distributionPerInstrument(Request $request)
    {
        $user = $request->user()->id;
        $true = TRUE;
        $signalCountPerInstruments = DB::select("SELECT COUNT(`currencies`.`id`) AS `y`, `currencies`.`name` FROM `signals` 
                            JOIN `currencies` ON `signals`.`currency_id`=`currencies`.`id` 
                            JOIN `email_logs` ON email_logs.`resource_id`=`signals`.`id` 
                            WHERE `email_logs`.`member_id` = $user AND `email_logs`.`resource_type` = 'APP\\\Signal' 
                            AND `email_logs`.`is_reportable` = $true
                            GROUP BY `currencies`.`name`");

        $total = 0;
        foreach($signalCountPerInstruments as $instrument) {
            $total += $instrument->y;
        }
        $graph = [];
        foreach($signalCountPerInstruments as $key => $instrument) {
            $y = ($instrument->y * 100)/$total;
            $decimals = 2;
            $expo = pow(10,$decimals);
            $y = intval($y*$expo)/$expo;
            $graph[$key]['y'] = $y;
            $graph[$key]['name'] = $instrument->name;
        }
        
        return response()->json(json_encode($graph), 200);
    }

    public function lastMonthSignal(Request $request)
    {
  
        $startDate 	= Carbon::now()->subMonth()->startOfMonth();
        $endDate 	= Carbon::now()->subMonth()->endOfMonth();
        // dd($startDate, $endDate);
		
        $user = $request->user()->id;
        $signals = Signal::select(['signals.*'])
                        ->with('categories')
                        ->join('email_logs', 'email_logs.resource_id', 'signals.id')
                        ->where('signals.created_at', '>=', $startDate)
                        ->where('signals.created_at', '<=', $endDate)
                        ->where('status', Signal::status('filled'))
                        ->where('email_logs.is_reportable', true)
                        ->where('email_logs.resource_type', 'APP\\Signal')
                        ->where('email_logs.member_id', $user)->get();

        return response()->json($signals, 200);
    }

}
