<?php

namespace App\Http\Controllers\Admin\Wallet;

use App\Member;
use Fxtutor\Wallet\Account;
use Fxtutor\Wallet\Deposit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BalanceController extends Controller
{
    protected $repository;

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $balances = Account::all();
        return view('admin.wallet.balances.index', compact('balances'));
    }

    public function getBalance(Request $request)
    {
        $membersWithBalance = Member::with('account')->where('email_verified_at', '!=',  NULL)->get();

        return response()->json($membersWithBalance, 200);
    }
}
