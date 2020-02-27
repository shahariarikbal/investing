<?php

namespace App\Http\Controllers\API\V1\Wallet;

use App\Events\WithdrawRequestReceivedEvent;
use Fxtutor\Wallet\Withdraw;
use Illuminate\Http\Request;
use Fxtutor\Wallet\Transaction;
use App\Http\Controllers\API\V1\ApiController;

// use Exception;

class WithdrawController extends ApiController
{

    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index(Request $request)
    {
        $withdraws = $request->user()->withdraws;
        return response()->json($withdraws, 200);
    }

    public function store(Request $request)
    {
        $rules = [
            'method' => 'required',
            'amount' => 'required'
        ];
        $rules['account'] = in_array($request->method, ['paypal', 'neteller', 'payoneer', 'skrill']) ? 'required|email' : 'required';

        $validatedData = $request->validate($rules);
        $data = $request->only([
            'method',
            'amount',
            'currency',
        ]);

        $user = $request->user();
        $data['member_id'] = $user->id;
        $data['process_fee'] = 0;
        $data['total'] = floatval($data['amount']) + floatval($data['process_fee']);

        $data['meta'] = [
            'account' => $request->account,
            'remark' => $request->input('remark')
        ];

        if (!$user->hasBalance($data['total'])) {
            return response()->json(['balance' => ['Not enough balance to withdraw.']], 422);
        }

        $withdraw = Withdraw::create($data);

        $user->creditTransaction(Transaction::RESTRICTED, "withdraw_request", $data['total'], $data, $withdraw);

        $subject = 'Your withdraw request has been received';

        event(new WithdrawRequestReceivedEvent($user->email, $withdraw, $subject));

        return response()->json(Withdraw::find($withdraw->id), 201);
    }

    public function cancel(Request $request, Withdraw $withdraw) {
        switch ($withdraw->status) {
            case 'approved':
                return response()->json(['message' => 'Your withdraw request has already been approved', 'type' => 'warning',  'withdraw' => $withdraw], 200);
            break;

            case 'unapproved':
                $withdraw->update(['status' => Withdraw::CANCEL]);
                $request->user()->debitTransaction(Transaction::RESTRICTED, "withdraw_request_canceled", $withdraw->total, $withdraw, $withdraw);

                return response()->json(['message' => 'Withdraw request has been canceled', 'type' => 'success', 'withdraw' => $withdraw], 200);
            break;
            
            case 'cancel':
                return response()->json(['message' => 'Your withdraw request has already been canceled', 'type' => 'warning', 'withdraw' => $withdraw], 200);
            break;

            default:
                return response()->json(['message' => 'Something went wrong. Please contact with us via support center', 'type' => 'danger', 'withdraw' => $withdraw], 200);
        }
    }
}
