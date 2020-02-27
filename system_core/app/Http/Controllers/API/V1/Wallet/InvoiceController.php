<?php

namespace App\Http\Controllers\API\V1\Wallet;

use Fxtutor\Wallet\Account;
use Illuminate\Http\Request;
use App\Http\Controllers\API\V1\ApiController;
use Fxtutor\Wallet\Transaction;

// use Exception;

class InvoiceController extends ApiController
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index(Request $request)
    {
        $user = $request->user();
        $invoices = $user->invoices;

        return response()->json($invoices);
    }
}
