<?php

namespace App\Http\Controllers\API\V1\Wallet;

use Fxtutor\Wallet\Plan;
use Fxtutor\Wallet\Account;
use Illuminate\Http\Request;
use App\Http\Controllers\API\V1\ApiController;
use Fxtutor\Wallet\Deposit;
use Fxtutor\Wallet\Transaction;

// use Exception;

class WalletController extends ApiController
{

    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function balance(Request $request)
    {
        $wallet = $request->user()->account;
        $deposit = $request->user()->deposits()->where('status', Deposit::APPROVED)->sum('total');
        $withdraw = $request->user()->withdraws->sum('total');
        $affiliate = 0;
        $subscriptions_amounts = $request->user()->subscriptions->map(function($subscription) {
                                    return $subscription->transaction ? $subscription->transaction->amount : 0;
                                })->toArray();
        $purchase = array_sum($subscriptions_amounts);

        return response()->json([
                                    'wallet' => $wallet,
                                    'deposit' => $deposit,
                                    'withdraw' => $withdraw,
                                    'affiliate' => $affiliate,
                                    'purchase' => $purchase
                                ], 200);
    }

    public function availableBalance(Request $request)
    {
        $account = $request->user()->account;
        return $account->balance - $account->restricted;
    }

    public function hasBalance(Request $request, Plan $plan)
    {

        if (!$request->user()->hasBalance($plan->price)) {
            return response()->json(['message' => 'not enough balance to subscribe'], 402);
        }
        return response()->json(['message' => 'You have available balance to subscribe this package'], 200);
        // $subscription = new SubscriptionBuilder($plan, $request->user());
        // $subscription->create();
    }

}
