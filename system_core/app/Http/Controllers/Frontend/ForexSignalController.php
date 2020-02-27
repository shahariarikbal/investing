<?php

namespace App\Http\Controllers\Frontend;

use App\Category;
use App\Currency;
use Illuminate\Http\Request;
use Butschster\Head\Facades\Meta;
use App\Http\Controllers\Controller;
use App\MarketSentiment;
use App\Signal;
use Carbon\Carbon;

class ForexSignalController extends BaseSignalController
{
    public function todaysSignal() 
    {
      $signals = Signal::with(['currency', 'categories'])
                        ->where('status', '!=', Signal::status('active'))
                        ->whereDate('updated_at', Carbon::today())
                        ->orderBy('updated_at', 'desc')->get();

      return response()->json($signals, 200);
    }

    public function index()
    {
        Meta::prependTitle('Forex Signal');

        $recent_closed_trades = Signal::with('currency')->whereStatus(Signal::status('filled'))->orderBy('updated_at', 'desc')->limit(6)->get();
          //dd($recent_closed_trades);
        // $currencies = Currency::all();
        $signals = $this->getSignals();
        $category_signals = Category::where('service', 'App\Signal')->get();
        //return $category_signals;
        //dd($signals);
        $marker_sentiments = MarketSentiment::where('status', 1)->orderBy('id', 'desc')->get();
        return view('frontend.signal.forex-signal', compact(['signals','recent_closed_trades', 'category_signals', 'marker_sentiments']));
    }

    public function catwisesignal(Category $category)
    {
      $recent_closed_trades = Signal::with('currency')->whereStatus(Signal::status('filled'))->orderBy('updated_at', 'desc')->limit(6)->get();
          //dd($recent_closed_trades);
        // $currencies = Currency::all();
      $signals = $this->getSignals(false, $category);
      $category_signals = Category::where('service', 'App\Signal')->get();
      return view('frontend.signal.forex-category-signal', compact(['signals','recent_closed_trades', 'category_signals']));
    }
}
