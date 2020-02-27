<?php

namespace App\Http\Controllers\Member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:member');
    }

    public function index() {
        return view('member.dashboard.index');
    }


    public function download(Request $request, $id)
    {
        $user = $request->user();
        
        return $user->invoices()->find($id)->download();
    }
}