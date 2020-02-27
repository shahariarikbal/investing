<?php

namespace App\Http\Controllers\Admin\Wallet;

use App\Member;
use Fxtutor\Wallet\Deposit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Events\DepositRequestApprovedEvent;
use App\Events\DepositRequestCanceledEvent;

class DepositController extends Controller
{
    protected $repository;

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $deposits = Deposit::all();
        return view('admin.wallet.deposits.index', compact('deposits'));
    }

    public function pending()
    {
        $pending = Deposit::with(['member', 'member.account', 'member.transactions'])
                            ->where('status', Deposit::UNAPPROVED)
                            ->orderBy('created_at', 'desc')->get();
        return response()->json($pending, 200);
    }

    public function getApprove()
    {
        $approve = Deposit::with(['member', 'member.account', 'member.transactions'])
                            ->where('status', Deposit::APPROVED)
                            ->orderBy('created_at', 'desc')->get();
        return response()->json($approve, 200);
    }

    public function postApprove(Request $request)
    {
        // return response()->json(true, 200);
        $deposit = Deposit::find($request->deposit_id);

        $class = $deposit->method;

        // return $class;
        if (!class_exists($class)) {
            return response()->json(['message' =>'Payment methods not exist.']);
        }
        $depositSuccess = (new $class)->success($request);

        $subject = 'Your deposit request has been approved';

        event(new DepositRequestApprovedEvent($deposit->member->email, $deposit, $subject));

        return response()->json($depositSuccess);

        $deposit->status = Deposit::APPROVED;
        $deposit->save();
        return response()->json([], 200);
    }

    public function getCancel()
    {
        $canceled = Deposit::with(['member', 'member.account', 'member.transactions'])
                            ->where('status', Deposit::CANCEL)
                            ->orderBy('created_at', 'desc')->get();
        return response()->json($canceled, 200);
    }

    public function postCancel(Request $request)
    {
        // return response()->json(true, 200);

        $deposit = Deposit::find($request->deposit_id);

        $class = $deposit->method;

        if (!class_exists($class)) {
            return response()->json(['message' =>'Payment methods not exist.']);
        }
        $depositFail = (new $class)->fail($request);

        $subject = 'Your deposit request has been canceled';

        event(new DepositRequestCanceledEvent($deposit->member->email, $deposit, $subject));

        return response()->json($depositFail);

        $deposit->status = Deposit::CANCEL;
        $deposit->save();

        return response()->json([], 200);
    }

    public function member(Request $request, Member $member)
    {
        $deposits = Deposit::with('member')->get();
        return response()->json($deposits);

    }

    public function transaction()
    {
        $member_transactions = Deposit::with('transaction')->get();
        return response()->json($member_transactions);
    }

    public function cancelDepositTransaction()
    {
        $cancel_transactions = Deposit::with('transaction')->get();
        return response()->json($cancel_transactions);
    }

    public function cancelMemberDeposit()
    {
        $cancel_deposits = Deposit::with('member')->get();
        return response()->json($cancel_deposits);
    }

    public function pendingDepositMember()
    {
        $pending_deposits = Deposit::with('member')->get();
        return response()->json($pending_deposits);
    }

    public function pendingDepositMemberTransaction()
    {
        $pending_transactions = Deposit::with('transaction')->get();
        return response()->json($pending_transactions);
    }
}
