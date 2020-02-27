<?php

namespace App\Http\Controllers\Admin\Wallet;

use App\Member;
use Fxtutor\Wallet\Withdraw;
use Illuminate\Http\Request;
use Fxtutor\Wallet\Transaction;
use App\Http\Controllers\Controller;
use App\Events\WithdrawRequestApprovedEvent;
use App\Events\WithdrawRequestCanceledEvent;

class WithdrawController extends Controller
{
    protected $repository;

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $withdraws = Withdraw::all();
        return view('admin.wallet.withdraws.index', compact('withdraws'));
    }

    public function pending()
    {
        $pending = Withdraw::with(['member', 'member.account', 'member.transactions'])
                            ->where('status', Withdraw::UNAPPROVED)
                            ->orderBy('created_at', 'desc')->get();
        return response()->json($pending, 200);
    }

    public function getApprove()
    {
        $approve = Withdraw::with(['member', 'member.account', 'member.transactions'])
                            ->where('status', Withdraw::APPROVED)
                            ->orderBy('created_at', 'desc')->get();
        return response()->json($approve, 200);
    }

    public function postApprove(Request $request)
    {
        $validatedData = $request->validate([
            'payment_id' => 'required',
            'withdraw_id' => 'required',
        ]);

        $withdraw = Withdraw::find($request->withdraw_id);
        $original = $withdraw->total;

        $withdraw->fill($request->all());
        $withdraw->status = Withdraw::APPROVED;
        $withdraw->meta = array_merge($withdraw->meta, ['sucess_note' => $request->input('note')]);

        if ($withdraw->save()) {
            $user = $withdraw->member;

            $user->debitTransaction(Transaction::RESTRICTED, "withdraw_request_success",$withdraw->total, $withdraw->toArray(), $withdraw);
            $user->debitTransaction(Transaction::BALANCE, "withdraw_balance", $withdraw->total, $withdraw->toArray(), $withdraw);
            
            $diff = floatval($withdraw->total) - floatval($original);
            
            if ( $diff < 0 ) {
                $user->debitTransaction(Transaction::RESTRICTED, "withdraw_request_differ", $diff , $withdraw->toArray(), $withdraw);
            }

            $subject = 'Your withdraw request has been approved';
            event(new WithdrawRequestApprovedEvent($user->email, $withdraw, $subject));

            return response()->json($withdraw);
        }

        return response()->json(['error' => 'issue on server.'], 500);

    }

    public function getCancel()
    {
        $canceled = Withdraw::with(['member', 'member.account'])
                            ->where('status', Withdraw::CANCEL)
                            ->orderBy('created_at', 'desc')->get();
        return response()->json($canceled, 200);
    }

    public function postCancel(Request $request)
    {
        // return response()->json(true, 200);

        $withdraw = Withdraw::find($request->withdraw_id);

        $withdraw->status = Withdraw::CANCEL;
        $withdraw->meta = array_merge($withdraw->meta, ['cancel_note' => $request->input('note')]);
        
        if ($withdraw->save()) {
            $user = $withdraw->member;
            $user->debitTransaction(Transaction::RESTRICTED, "withdraw_request_cancel",$withdraw->total, $withdraw->toArray(), $withdraw);

            
            $subject = 'Your withdraw request has been canceled';

            event(new WithdrawRequestCanceledEvent($withdraw->member->email, $withdraw, $subject));

            return response()->json($withdraw);
        }
        return response()->json([], 200);
    }
}
