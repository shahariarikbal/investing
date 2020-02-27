<?php

namespace App\Http\Controllers\Admin;

use App\Currency;
use App\Http\Controllers\Controller;
use App\MarketSentiment;
use Illuminate\Http\Request;

class MarketSentimentController extends Controller
{
    public function index()
    {
        $currencies = Currency::orderBy('id', 'desc')->get();
        $market_sentiment = MarketSentiment::orderBy('id', 'desc')->get();
        return view('admin.market_sentiments.index', compact('currencies', 'market_sentiment'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'currency_id'   => 'required|unique:market_sentiments',
            'buy'           => 'required',
            'sell'          => 'required',
        ]);

        $market_sentiment = new MarketSentiment();
        $market_sentiment->currency_id  = $request->currency_id;
        $market_sentiment->buy          = $request->buy;
        $market_sentiment->sell         = $request->sell;
        $market_sentiment->status       = $request->status;
        $market_sentiment->save();
        return response()->json(['message' => 'Market Sentiments has been successfully inserted']);
    }

    public function edit(MarketSentiment $sentiment)
    {
        return $sentiment;
    }

    public function update(Request $request, MarketSentiment $sentiment)
    {
        //dd($request->all());
        $validator = $this->validate($request, [
            'currency_id' => 'required',
            'buy'         => 'required',
            'sell'        => 'required',
        ]);

        $sentiment->update([
            'currency_id'   => $request->currency_id,
            'buy'           => $request->buy,
            'sell'          => $request->sell,
            'status'        => $request->status,
        ]);
        return response()->json(['message' => 'Market Sentiments has been successfully updated']);
    }

    public function active(MarketSentiment $sentiment)
    {
        $sentiment->status = true;
        $sentiment->save();
        return redirect()->back()->with('message', 'Market Sentiment has been activated');
    }

    public function pending(MarketSentiment $sentiment)
    {
        $sentiment->status = false;
        $sentiment->save();
        return redirect()->back()->with('message', 'Market Sentiment has been pending');
    }

    public function delete(MarketSentiment $sentiment)
    {
        $sentiment->forceDelete();
        return redirect()->back()->with('message', 'Market Sentiment has been permanently deleted');
    }
}
