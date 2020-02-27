<?php

namespace App\Http\Controllers\Frontend;

use App\Signal;
use App\Currency;
use Carbon\Carbon;
use App\Subscription;
use Illuminate\Http\Request;
use Butschster\Head\Facades\Meta;
use App\Http\Controllers\Controller;

class ForexSignalReportController extends FrontendController
{
    public function index()
    {
        Meta::prependTitle('Forex Signal Report');

        $calculations = [
            'total_members'             =>  Subscription::whereService('App\Signal')->count(),
            'total_signal'              =>  Signal::count(),
            'performance_percentages'   => $this->performancePercentages(),
            'avg_signal_per_weeks'	    => $this->avgSignalPerWeeks(),
            'total_pips_gain'		    => $this->totalPipsGain()
        ];
        $signalPercentagePerCurrencyPair = $this->signalPercentagePerCurrencyPair();
        $currencies = Currency::has('signals')->get();
        $weeklyReportTotal = $this->WeeklyReportTotal();
        $weeklyReport = $this->WeeklyReport($currencies);
        $monthlyReportTotal = $this->monthlyReportTotal();
        $monthlyReport = $this->monthlyReport($currencies);
        $yearlyReportTotal = $this->yearlyReportTotal();
		$yearlyReport = $this->yearlyReport($currencies);
        return view('frontend.signal.forex-signal-report', [
            'calculations'                     => $calculations,
            'signalPercentagePerCurrencyPair'  => $signalPercentagePerCurrencyPair,
            'currencies'                       => $currencies,
            'weeklyReportTotal'                => $weeklyReportTotal,
            'weeklyReport'                     => $weeklyReport,
            'monthlyReportTotal'               => $monthlyReportTotal,
            'monthlyReport'                    => $monthlyReport,
            'yearlyReportTotal'                => $yearlyReportTotal,
            'yearlyReport'                     => $yearlyReport
        ]);
    }

    protected function performancePercentages()
    {
        $totalFillSignal = Signal::where('status', Signal::status('filled'))->count();
        $totalProfitSignal = Signal::where('profit', true)->count();

        if (!empty($totalFillSignal) && !empty($totalProfitSignal)) {
            return ($totalProfitSignal * 100) / $totalFillSignal;
        }
        return 0;
    }

    protected function getStartAndEndDate($week, $year)
	{
		$dateTime = new \DateTime();
		$dateTime->setISODate($year, $week);
		$result[] = $dateTime->format('d-m-Y');
		$dateTime->modify('+6 days');
		$result[] = $dateTime->format('d-m-Y');
		return $result;
    }
    
    protected function avgSignalPerWeeks()
	{
		if(Signal::get()->count() === 0) {
			return 0;
		}

		$firstDate = new Carbon(Signal::select('created_at')->orderBy('created_at', 'ASC')->first()->created_at);
		$lastDate = new Carbon(Signal::select('created_at')->orderBy('created_at', 'DESC')->first()->created_at);


		$weeks = array();

		while ($firstDate < $lastDate) {
			$year = $firstDate->format('Y');
			$weeks[] = $this->getStartAndEndDate($firstDate->format('W'), $firstDate->format('Y'));
			$firstDate = $firstDate->addDays(7);
		}


		$count = 0;
		foreach ($weeks as $week) {
			$count += Signal::whereBetween('created_at', [date("Y-m-d", strtotime($week[0])), date("Y-m-d", strtotime($week[1]))])->count();
		}
		return count($weeks) ? $count / count($weeks) : 0;
    }
    
    protected static function totalPipsGain()
	{
		$fillProfitsignal 	= Signal::where('pips', '!=', null)->where('profit', true)->sum('pips');
		$fillLosssignal 	= Signal::where('pips', '!=', null)->where('profit', false)->sum('pips');

		return $fillProfitsignal - $fillLosssignal;
    }
    
    public static function signalPercentagePerCurrencyPair()
	{

		$allSignal  = Signal::with('currency')->count();
		$currencies    = Currency::has('signals')->get();

		$cal = [];
		$count = 0;
		if (!empty($allSignal) && !empty($currencies)) {
			foreach ($currencies as $currency) {
				$cal[$count++]  = '{ ' . 'name: ' . "'" . $currency->name . "'" . ', ' . 'y :' . ((Signal::where('currency_id', $currency->id)->count() * 100) / $allSignal) . ' }';
			}
		}
		return implode(',', $cal);
    }
    
    public static function WeeklyReportTotal()
	{
		$allSignal = Signal::where('status', Signal::status('filled'))
			->whereBetween('updated_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
			->get();
		$pipGain = [
			'monday' => 0,
			'tuesday' => 0,
			'wednesday' => 0,
			'thursday' => 0,
			'friday' => 0,
		];
		$pipsLoss = [
			'monday' => 0,
			'tuesday' => 0,
			'wednesday' => 0,
			'thursday' => 0,
			'friday' => 0,
		];
		$report = [
			'monday' => [],
			'tuesday' => [],
			'wednesday' => [],
			'thursday' => [],
			'friday' => [],
			'total' => [],
		];
		$report['monday']['pips'] = 0;
		$report['monday']['meta'] = [];
		$report['monday']['meta']['profit'] = NULL;
		$report['tuesday']['pips'] = 0;
		$report['tuesday']['meta'] = [];
		$report['tuesday']['meta']['profit'] = NULL;
		$report['wednesday']['pips'] = 0;
		$report['wednesday']['meta'] = [];
		$report['wednesday']['meta']['profit'] = NULL;
		$report['thursday']['pips'] = 0;
		$report['thursday']['meta'] = [];
		$report['thursday']['meta']['profit'] = NULL;
		$report['friday']['pips'] = 0;
		$report['friday']['meta'] = [];
		$report['friday']['meta']['profit'] = NULL;

		$report['monday']['total']['pips'] = 0;
		$report['tuesday']['total']['pips'] = 0;
		$report['wednesday']['total']['pips'] = 0;
		$report['thursday']['total']['pips'] = 0;
		$report['friday']['total']['pips'] = 0;

		$report['total']['pips'] = 0;
		$report['total']['meta'] = [];
		$report['total']['meta']['profit'] = NULL;

		foreach ($allSignal as $signal) {
			if ($signal->updated_at->isMonday()) {
				if ($signal->profit) {
					$pipGain['monday'] += $signal->pips;
				} else {
					$pipsLoss['monday'] += $signal->pips;
				}
				$report['monday']['pips'] = $pipGain['monday'] - $pipsLoss['monday'];
				if ($report['monday']['pips'] > 0) {
					$report['monday']['meta']['profit'] = true;
				}
				if ($report['monday']['pips'] < 0) {
					$report['monday']['meta']['profit'] = false;
				}
			}
			if ($signal->updated_at->isTuesday()) {
				if ($signal->profit) {
					$pipGain['tuesday'] += $signal->pips;
				} else {
					$pipsLoss['tuesday'] += $signal->pips;
				}
				$report['tuesday']['pips'] = $pipGain['tuesday'] - $pipsLoss['tuesday'];
				if ($report['tuesday']['pips'] > 0) {
					$report['tuesday']['meta']['profit'] = true;
				}
				if ($report['tuesday']['pips'] < 0) {
					$report['tuesday']['meta']['profit'] = false;
				}
			}
			if ($signal->updated_at->isWednesday()) {
				if ($signal->profit) {
					$pipGain['wednesday'] += $signal->pips;
				} else {
					$pipsLoss['wednesday'] += $signal->pips;
				}
				$report['wednesday']['pips'] = $pipGain['wednesday'] - $pipsLoss['wednesday'];
				if ($report['wednesday']['pips'] > 0) {
					$report['wednesday']['meta']['profit'] = true;
				}
				if ($report['wednesday']['pips'] < 0) {
					$report['wednesday']['meta']['wednesday'] = false;
				}
			}
			if ($signal->updated_at->isThursday()) {
				if ($signal->profit) {
					$pipGain['thursday'] += $signal->pips;
				} else {
					$pipsLoss['thursday'] += $signal->pips;
				}
				$report['thursday']['pips'] = $pipGain['monday'] - $pipsLoss['thursday'];
				if ($report['thursday']['pips'] > 0) {
					$report['thursday']['meta']['profit'] = true;
				}
				if ($report['thursday']['pips'] < 0) {
					$report['thursday']['meta']['profit'] = false;
				}
			}
			if ($signal->updated_at->isFriday()) {
				if ($signal->profit) {
					$pipGain['friday'] += $signal->pips;
				} else {
					$pipsLoss['friday'] += $signal->pips;
				}
				$report['friday']['pips'] = $pipGain['friday'] - $pipsLoss['friday'];
				if ($report['friday']['pips'] > 0) {
					$report['friday']['meta']['profit'] = true;
				}
				if ($report['friday']['pips'] < 0) {
					$report['friday']['meta']['profit'] = false;
				}
			}
		}
		$report['total']['pips'] = $report['monday']['pips'];
		$report['total']['pips'] += $report['tuesday']['pips'] ;
		$report['total']['pips'] += $report['wednesday']['pips'];
		$report['total']['pips'] += $report['thursday']['pips'];
		$report['total']['pips'] += $report['friday']['pips'];

		if ($report['total']['pips'] > 0) {
			$report['total']['meta']['profit'] = true;
		}
		if ($report['total']['pips'] < 0) {
			$report['total']['meta']['profit'] = false;
		}
		
		return $report;
    }
    
    public static function WeeklyReport($pairs)
	{
		$report = [
			'monday' => [],
			'tuesday' => [],
			'wednesday' => [],
			'thursday' => [],
			'friday' => [],
			'total' => [],
		];
		foreach ($pairs as $pair) {
			$allSignal = Signal::where('currency_id', $pair->id)
				->where('status', Signal::status('filled'))
				->whereBetween('updated_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
				->get();


			$pipGain = [
				'monday' => 0,
				'tuesday' => 0,
				'wednesday' => 0,
				'thursday' => 0,
				'friday' => 0,
			];
			$pipsLoss = [
				'monday' => 0,
				'tuesday' => 0,
				'wednesday' => 0,
				'thursday' => 0,
				'friday' => 0,
			];

			$report['monday'][$pair->name] = [];
			$report['tuesday'][$pair->name] = [];
			$report['wednesday'][$pair->name] = [];
			$report['thursday'][$pair->name] = [];
			$report['friday'][$pair->name] = [];
			$report['total'][$pair->name] = [];
			$report['monday'][$pair->name]['pips'] = 0;
			$report['monday'][$pair->name]['meta']['profit'] = NULL;
			$report['tuesday'][$pair->name]['pips'] = 0;
			$report['tuesday'][$pair->name]['meta']['profit'] = NULL;
			$report['wednesday'][$pair->name]['pips'] = 0;
			$report['wednesday'][$pair->name]['meta']['profit'] = NULL;
			$report['thursday'][$pair->name]['pips'] = 0;
			$report['thursday'][$pair->name]['meta']['profit'] = NULL;
			$report['friday'][$pair->name]['pips'] = 0;
			$report['friday'][$pair->name]['meta']['profit'] = NULL;
			$report['total'][$pair->name]['pips'] = 0;
			$report['total'][$pair->name]['meta']['profit'] = NULL;

			foreach ($allSignal as $signal) {

				if ($signal->updated_at->isMonday()) {

					if ($signal->profit) {
						$pipGain['monday'] += $signal->pips;
					} else {
						$pipsLoss['monday'] += $signal->pips;
					}
					$report['monday'][$pair->name]['pips'] = $pipGain['monday'] - $pipsLoss['monday'];

					if ($report['monday'][$pair->name]['pips'] > 0) {
						$report['monday'][$pair->name]['meta']['profit'] = true;
					}
					if ($report['monday'][$pair->name]['pips'] < 0) {
						$report['monday'][$pair->name]['meta']['profit'] = false;
					}

					$report['total'][$pair->name]['pips'] = $report['monday'][$pair->name]['pips'];
				}

				if ($signal->updated_at->isTuesday()) {
					if ($signal->profit) {
						$pipGain['tuesday'] += $signal->pips;
					} else {
						$pipsLoss['tuesday'] += $signal->pips;
					}
					$report['tuesday'][$pair->name]['pips'] = $pipGain['tuesday'] - $pipsLoss['tuesday'];

					if ($report['tuesday'][$pair->name]['pips'] > 0) {
						$report['tuesday'][$pair->name]['meta']['profit'] = true;
					}
					if ($report['tuesday'][$pair->name]['pips'] < 0) {
						$report['tuesday'][$pair->name]['meta']['profit'] = false;
					}

					$report['total'][$pair->name]['pips'] += $report['tuesday'][$pair->name]['pips'];
				}

				if ($signal->updated_at->isWednesday()) {
					if ($signal->profit) {
						$pipGain['wednesday'] += $signal->pips;
					} else {
						$pipsLoss['wednesday'] += $signal->pips;
					}
					$report['wednesday'][$pair->name]['pips'] = $pipGain['wednesday'] - $pipsLoss['wednesday'];

					if ($report['wednesday'][$pair->name]['pips'] > 0) {
						$report['wednesday'][$pair->name]['meta']['profit'] = true;
					}
					if ($report['wednesday'][$pair->name]['pips'] < 0) {
						$report['wednesday'][$pair->name]['meta']['profit'] = false;
					}

					$report['total'][$pair->name]['pips'] += $report['wednesday'][$pair->name]['pips'];
				}

				if ($signal->updated_at->isThursday()) {
					if ($signal->profit) {
						$pipGain['thursday'] += $signal->pips;
					} else {
						$pipsLoss['thursday'] += $signal->pips;
					}
					$report['thursday'][$pair->name]['pips'] = $pipGain['thursday'] - $pipsLoss['thursday'];

					if ($report['thursday'][$pair->name]['pips'] > 0) {
						$report['thursday'][$pair->name]['meta']['profit'] = true;
					}
					if ($report['thursday'][$pair->name]['pips'] < 0) {
						$report['thursday'][$pair->name]['meta']['profit'] = false;
					}

					$report['total'][$pair->name]['pips'] += $report['thursday'][$pair->name]['pips'];
				}

				if ($signal->updated_at->isFriday()) {
					if ($signal->profit) {
						$pipGain['friday'] += $signal->pips;
					} else {
						$pipsLoss['friday'] += $signal->pips;
					}
					$report['friday'][$pair->name]['pips'] = $pipGain['friday'] - $pipsLoss['friday'];

					if ($report['friday'][$pair->name]['pips'] > 0) {
						$report['friday'][$pair->name]['meta']['profit'] = true;
					}
					if ($report['friday'][$pair->name]['pips'] < 0) {
						$report['friday'][$pair->name]['meta']['profit'] = false;
					}

					$report['total'][$pair->name]['pips'] += $report['friday'][$pair->name]['pips'];
				}

				if ($report['total'][$pair->name]['pips'] > 0) {
					$report['total'][$pair->name]['meta']['profit'] = true;
				}
				if ($report['total'][$pair->name]['pips'] < 0) {
					$report['total'][$pair->name]['meta']['profit'] = false;
				}
			}
		}
		return $report;
    }
    
    public function monthlyReportTotal()
	{
		$months = [
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
			'december'
		];

		$reports = [];
		$reports['total'] = [];
		$reports['total']['pips'] = 0;
		$reports['total']['meta'] = [];
		$reports['total']['meta']['profit'] = null;
		// january
		foreach ($months as $key => $month) {

			$pipsGain[$month] = 0;
			$pipsLoss[$month] = 0;
			$reports[$month] = [];
			$reports[$month]['pips'] = 0;
			$reports[$month]['meta'] = [];
			$reports[$month]['meta']['profit'] = NULL;

			$allSignal = Signal::where('status', Signal::status('filled'))
				->whereBetween('updated_at', [$this->getMonthsInRange($key, 'start'), $this->getMonthsInRange($key, 'end')])->get();

			foreach ($allSignal as $signal) {
				if ($signal->profit) {
					$pipsGain[$month] += $signal->pips;
				} else {
					$pipsLoss[$month] += $signal->pips;
				}
			}
			$reports[$month]['pips'] = $pipsGain[$month] - $pipsLoss[$month];
			if ($reports[$month]['pips'] > 0) {
				$reports[$month]['meta']['profit'] = true;
			}
			if ($reports[$month]['pips'] < 0) {
				$reports[$month]['meta']['profit'] = false;
			}
			$reports['total']['pips'] += $reports[$month]['pips'];
		}
		if ($reports['total']['pips'] > 0) {
			$reports['total']['meta']['profit'] = true;
		}
		if ($reports['total']['pips'] < 0) {
			$reports['total']['meta']['profit'] = false;
		}

		return $reports;
	}

	public function monthlyReport($pairs)
	{


		$months = [
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

		$reports = [];
		$reports['total'] = [];
		// january
		foreach ($months as $key => $month) {
			$pipsGain[$month] = [];
			$pipsLoss[$month] = [];
			$reports[$month] = [];

			foreach ($pairs as $pair) {
				$pipsGain[$month][$pair->name] = 0;
				$pipsLoss[$month][$pair->name] = 0;
				$reports[$month][$pair->name] = [];
				if (!array_key_exists($pair->name, $reports['total'])) {
					$reports['total'][$pair->name] = [];
					$reports['total'][$pair->name]['pips'] = 0;
					$reports['total'][$pair->name]['meta'] = [];
				}
				$allSignal = Signal::where('currency_id', $pair->id)
					->where('status', Signal::status('filled'))
					->whereBetween('updated_at', [$this->getMonthsInRange($key, 'start'), $this->getMonthsInRange($key, 'end')])->get();

				foreach ($allSignal as $signal) {
					if ($signal->profit) {
						$pipsGain[$month][$pair->name] += $signal->pips;
					} else {
						$pipsLoss[$month][$pair->name] += $signal->pips;
					}
				}
				$reports[$month][$pair->name]['pips'] = $pipsGain[$month][$pair->name] - $pipsLoss[$month][$pair->name];
				$reports[$month][$pair->name]['meta'] = [];
				$reports[$month][$pair->name]['meta']['profit'] = NULL;
				if ($reports[$month][$pair->name]['pips'] > 0) {
					$reports[$month][$pair->name]['meta']['profit'] = true;
				}
				if ($reports[$month][$pair->name]['pips'] < 0) {
					$reports[$month][$pair->name]['meta']['profit'] = false;
				}

				$reports['total'][$pair->name]['pips'] += $reports[$month][$pair->name]['pips'];
				$reports['total'][$pair->name]['meta']['profit'] = NULL;
				if ($reports['total'][$pair->name]['pips'] > 0) {
					$reports['total'][$pair->name]['meta']['profit'] = true;
				}
				if ($reports['total'][$pair->name]['pips'] < 0) {
					$reports['total'][$pair->name]['meta']['profit'] = false;
				}
			}
		}

		return $reports;
    }
    
    protected function getMonthsInRange($index, $value)
	{
		$startDate 	= Carbon::now()->startOfYear();
		$endDate 	= Carbon::now()->endOfYear();
		$months = array();
		while (strtotime($startDate) <= strtotime($endDate)) {
			$months[] = array('start' => Carbon::parse($startDate)->startOfMonth(), 'end' => Carbon::parse($startDate)->endOfMonth(),);
			$startDate = date('Y-m-d H:i:s', strtotime($startDate .
				'+ 1 month'));
		}

		return $months[$index][$value];
    }
    
    public function yearlyReportTotal()
	{
		$years = [
			'2018', '2019', '2020'
		];
		$reports = [];
		$reports['total'] = [];
		$reports['total']['pips'] = 0;
		$reports['total']['meta'] = [];
		$reports['total']['meta']['profit'] = NULL;

		foreach ($years as $year) {
			$pipsGain[$year] = 0;
			$pipsLoss[$year] = 0;
			$reports[$year] = [];
			$reports[$year]['pips'] = 0;
			$reports[$year]['meta'] = [];
			$reports[$year]['meta']['profit'] = NULL;

			$allSignal = Signal::where('status', Signal::status('filled'))
				->whereYear('updated_at', $year)->get();

			foreach ($allSignal as $signal) {
				if ($signal->profit) {
					$pipsGain[$year] += $signal->pips;
				} else {
					$pipsLoss[$year] += $signal->pips;
				}
			}
			$reports[$year]['pips'] = $pipsGain[$year] - $pipsLoss[$year];
			if ($reports[$year]['pips'] > 0) {
				$reports[$year]['meta']['profit'] = true;
			}
			if ($reports[$year]['pips'] < 0) {
				$reports[$year]['meta']['profit'] = false;
			}
			$reports['total']['pips'] += $reports[$year]['pips'];
		}

		if ($reports['total']['pips'] > 0) {
			$reports['total']['meta']['profit'] = true;
		}
		if ($reports['total']['pips'] < 0) {
			$reports['total']['meta']['profit'] = false;
		}

		return $reports;
	}

	public function yearlyReport($pairs)
	{
		$years = [
			'2018', '2019', '2020'
		];

		$reports = [];
		$reports['total'] = [];
		foreach ($years as $year) {
			$pipsGain[$year] = [];
			$pipsLoss[$year] = [];
			$reports[$year] = [];

			foreach ($pairs as $pair) {
				$pipsGain[$year][$pair->name] = 0;
				$pipsLoss[$year][$pair->name] = 0;
				$reports[$year][$pair->name] = [];
				// $reports['total'][$pair->title] = [];
				// $reports['total'][$pair->title]['pips'] = 0;
				// $reports['total'][$pair->title]['meta'] = [];
				// $reports['total'][$pair->title]['meta']['profit'] = 0;

				if (!array_key_exists($pair->name, $reports['total'])) {
					$reports['total'][$pair->name] = [];
					$reports['total'][$pair->name]['pips'] = 0;
					$reports['total'][$pair->name]['meta'] = [];
				}

				$allSignal = Signal::where('currency_id', $pair->id)
					->where('status', Signal::status('filled'))
					->whereYear('updated_at', $year)->get();

				foreach ($allSignal as $signal) {
					if ($signal->profit) {
						$pipsGain[$year][$pair->name] += $signal->pips;
					} else {
						$pipsLoss[$year][$pair->name] += $signal->pips;
					}
				}

				$reports[$year][$pair->name]['pips'] = $pipsGain[$year][$pair->name] - $pipsLoss[$year][$pair->name];
				$reports[$year][$pair->name]['meta'] = [];
				$reports[$year][$pair->name]['meta']['profit'] = NULL;
				if ($reports[$year][$pair->name]['pips'] > 0) {
					$reports[$year][$pair->name]['meta']['profit'] = true;
				}
				if ($reports[$year][$pair->name]['pips'] < 0) {
					$reports[$year][$pair->name]['meta']['profit'] = false;
				}

				$reports['total'][$pair->name]['pips'] += $reports[$year][$pair->name]['pips'];
				$reports['total'][$pair->name]['meta']['profit'] = NULL;
				if ($reports['total'][$pair->name]['pips'] > 0) {
					$reports['total'][$pair->name]['meta']['profit'] = true;
				}
				if ($reports['total'][$pair->name]['pips'] < 0) {
					$reports['total'][$pair->name]['meta']['profit'] = false;
				}
			}
		}
		return $reports;
    }

    private function processDetails(Request $request)
	{
		if ($request->has('day')) {
			if (array_search($request->day, ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'total']) === false) {
				return response("Bad Request", 400);
			}
			$date = Carbon::now()->startOfWeek();

			if ($request->day === 'tuesday') $date = $date->addDays(1);
			if ($request->day === 'wednesday') $date = $date->addDays(2);
			if ($request->day === 'thursday') $date = $date->addDays(3);
			if ($request->day === 'friday') $date = $date->addDays(4);

			if ($request->day !== 'total') {
				$signals = Signal::where('status', Signal::status('filled'))->whereDate('created_at', $date);
			} else {
				$signals = Signal::where('status', Signal::status('filled'))->whereBetween('updated_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]);
			}

			if ($request->has('currency')) {
				$currencyId = Currency::has('signals')->where('name', $request->currency)->first()->id;
				$signals = $signals->where('currency_id', $currencyId);
			}
			return $signals->get();
		}

		if ($request->has('month')) {

			$months = [
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
				'total'
			];

			$key = array_search($request->month, $months);
			if ($key === false) {
				return response("Bad Request", 400);
			}

			if ($request->month !== 'total') {
				$startRange = $this->getMonthsInRange($key, 'start');
				$endRange = $this->getMonthsInRange($key, 'end');
			} else {
				$startRange = Carbon::now()->startOfYear();
				$endRange = Carbon::now()->endOfYear();
			}


			$signals = Signal::with('currency')->where('status', Signal::status('filled'))
				->whereBetween('updated_at', [$startRange, $endRange]);

			if ($request->has('currency')) {
				$currencyId = Currency::has('signals')->where('name', $request->currency)->first()->id;
				$signals = $signals->where('currency_id', $currencyId);
			}
			return $signals->get();
		}

		if ($request->has('year')) {

			$years = [
				'2018',
				'2019',
				'2020',
				'total'
			];

			if (array_key_exists($request->year, $years)) {
				abort(400);
			}

			if ($request->year !== 'total') {
				$signals = Signal::where('status', Signal::status('filled'))
					->whereYear('updated_at', $request->year);
			} else {
				$signals = Signal::where('status', Signal::status('filled'));
			}

			// return $signals->get();
			if ($request->has('currency')) {
				$currencyId = Currency::has('signals')->where('name', $request->currency)->first()->id;
				$signals = $signals->where('currency_id', $currencyId);
			}
			return $signals->get();
		}
	}
    
    public function detailReport(Request $request)
	{
		$small_screen_title = 'Forex Signal Report';
		$name = '';
		if ($request->has('month') && $request->month === 'total') {
			$name = "Forex Signal in " . date('Y');
			if ($request->has('currency')) {
				$name = $request->currency . " " . $name;
			}
		}
		if ($request->has('month') && $request->month !== 'total') {
			$name = "Forex Signal in " . ucfirst($request->month) . ' ' . date('Y');
			if ($request->has('currency')) {
				$name = $request->currency . " " . $name;
			}
		}

		if ($request->has('day') && $request->day === 'total') {
			$name = "Forex Signal between " . Carbon::now()->startOfWeek() . ' and ' . Carbon::now()->endOfWeek();
			if ($request->has('currency')) {
				$name = $request->currency . " " . $name;
			}
		}
		if ($request->has('day') && $request->month !== 'total') {
			$name = "Forex Signal in " . ucfirst($request->day) . ' of this Week';
			if ($request->has('currency')) {
				$name = $request->currency . " " . $name;
			}
		}

		if ($request->has('year') && $request->year === 'total') {
			$name = "All Forex Signal";
			if ($request->has('currency')) {
				$name = "All " . $request->currency . " Forex Signal";
			}
		}
		if ($request->has('year') && $request->year !== 'total') {
			$name = "Forex Signal in " . $request->year;
			if ($request->has('currency')) {
				$name = $request->currency . " " . $name;
			}
		}

		$name = $name . ' | ' . env('APP_NAME');

		$description = "Realtime forex signal report across several trading instrument with graph";

		$signals = $this->processDetails($request);

		if (request()->wantsJson()) {
			foreach ($signals as $key => $signal) {
				$data[$key]['updated_at'] = $signal->updated_at->toFormattedDateString();
				$data[$key]['pips'] = $signal->pips;
				$data[$key]['is_profit'] = $signal->is_profit;
			}

			return $data;
		}

		return view('frontend.signal.details', compact(['name', 'description', 'signals', 'small_screen_title']));
    }
    
    public function signalDetails($currency, $year, $month, $day, Signal $signal)
	{
		$small_screen_title = 'Forex Signal';
		$name = $signal->currency->name . ' Forex Signal @ ' . $signal->updated_at->toDateTimeString() . ' | FxsuccessBD';
		$description = "";
		return view('frontend.signal.signal', compact(['name', 'description', 'signal', 'small_screen_title']));
    }
    
    public function detailsForGraph(Request $request)
	{
		$signals = $this->processDetails($request);

		foreach ($signals as $key => $signal) {
			$data[$key]['updated_at'] = $signal->updated_at->toFormattedDateString();
			$data[$key]['pips'] = $signal->pips;
			$data[$key]['is_profit'] = $signal->is_profit;
		}

		return $data;
	}
}
