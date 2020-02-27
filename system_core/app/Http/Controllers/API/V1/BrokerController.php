<?php

namespace App\Http\Controllers\API\V1;

use App\Broker;
use Illuminate\Http\Request;

class BrokerController extends ApiController
{

    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index()
    {
        return Broker::select(['id', 'name'])->get();
        return response()->json(Broker::select(['id', 'name'])->get(), 200);
        // $subscription = new SubscriptionBuilder($plan, $request->user());
        // $subscription->create();
    }

    public function reviewStore(Request $request, Broker $broker)
    {
        $request->validate([
            'value' =>'required',
            'title' => 'required',
            'comment' => 'required'
        ]);

        $data = $request->only([
            'value',
            'title',
            'comment'
        ]);
        $user = $request->user();
        if ($user->isRated($broker)) {
            return response()->json(['success' => true, 'message'=> 'Already given']);
        }
        $review = $user->rate($broker, $data);
        
        return response()->json(['success' => true, 'message'=> 'new review is submitted']);
    }

}
