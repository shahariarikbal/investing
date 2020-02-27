<?php
namespace Fxtutor\Wallet\Http\Controllers;


use App\Http\Controllers\Controller;

class WalletController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('wallet::index');
    }

}
