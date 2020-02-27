<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Member;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.members.index');
    }

    public function members()
    {
        return Member::orderBy('id', 'desc')->get();
    }

    public function balance($member)
    {
        $member = Member::with('account')->where('id', $member)->first();

        return response()->json($member, 200);
    }

    public function deposit($member)
    {
        $member = Member::with(['deposits', 'deposits.transactions'])->where('id', $member)->first();

        return response()->json($member, 200);
    }

    public function subscriptions($member)
    {
        $member = Member::with(['subscriptions', 'subscriptions.transactions', 'subscriptions.plan'])->where('id', $member)->first();

        return response()->json($member, 200);
    }

}
