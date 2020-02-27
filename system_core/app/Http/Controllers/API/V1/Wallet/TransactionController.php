<?php

namespace App\Http\Controllers\API\V1\Wallet;

use Fxtutor\Wallet\Account;
use Illuminate\Http\Request;
use App\Http\Controllers\API\V1\ApiController;
use Fxtutor\Wallet\Transaction;

// use Exception;

class TransactionController extends ApiController
{

    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index(Request $request)
    {
        $transactions = Transaction::where('balance_type', Transaction::BALANCE)
                            ->where('member_id', $request->user()->id)->get();

        $transactions->map(function($t){
            $t->message = __("wallet::transactions.{$t->action}.message", $t->meta);
            return $t;
        });
        if ($request->type === 'recent') {
            return response()->json($transactions, 200);
        }
        return response()->json([], 200);
    }

}
