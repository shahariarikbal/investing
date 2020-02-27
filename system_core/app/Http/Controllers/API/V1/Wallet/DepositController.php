<?php

namespace App\Http\Controllers\API\V1\Wallet;

use Fxtutor\Wallet\Deposit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Events\DepositRequestReceivedEvent;
use App\Http\Controllers\API\V1\ApiController;

// use Exception;

class DepositController extends ApiController
{

    public function __construct()
    {
        $this->middleware('auth:api')->except(['success', 'fail', 'status']);
    }

    public function index(Request $request)
    {
        if ($request->type === 'recent') {
            return response()->json($request->user()->deposits, 200);
        }
        return response()->json([], 200);
    }

    public function deposit(Request $request)
    {
        $method = $request->input('method');
        $class = config("wallet.payment-methods.$method");

        $validator = Validator::make($request->all(), [
            'method' => 'required',
            'amount' => 'required|numeric',
            'process_fee' => 'nullable|numeric',
            'file' => 'nullable|mimes:jpeg,bmp,png,pdf'
        ]);

        $validator->after(function ($validator) use ($class) {
            if (!class_exists($class)) {
                $validator->errors()->add('class', 'Payment method not Support.');
            }
        })->validate();

        $amonut = $request->get('amount');
        $process_fee = $request->process_fee;
        $tax = $request->has('tax')? $request->get('tax'): 0;

        $total = floatval($amonut) + floatval($process_fee) + floatval($tax);
        $meta = [];
        $notes = $request->notes ?: '';

        if ($request->hasFile('transaction_screenshot')) {
            $screenshot = \FileUpload::upload('transaction', $request['transaction_screenshot']);
            
            $meta = [
                'upload' => $screenshot,
            ];
        }

        $meta['notes'] = $notes;
        
        $deposit = Deposit::create([
            'method' => $class,
            'member_id' => $request->user()->id,
            'amount' => $amonut,
            'process_fee' => $process_fee,
            'payment_id' => $request->has('transaction_id')? $request->get('transaction_id'): null,
            'tax' => $tax,
            'total' => $total,
            'meta' => $meta
        ]);

        $payment = new $class();

        $subject = 'Your deposit request has been received';

        event(new DepositRequestReceivedEvent($request->user()->email, $deposit, $subject));

        if ($deposit) {
            $response =  $payment->depositRequest($deposit);

            if ($method === 'paypal' || $method === 'perfect-money') {
                return response()->json($response);
            } else {
                return response()->json(Deposit::find($deposit->id), 201);
            }
        }

        return response()->json([]);
    }

    public function show(Request $request, Deposit $deposit)
    {
        return response()->json($deposit, 200);
    }

    public function success(Request $request, $method)
    {
        $class = config("wallet.payment-methods.$method");

        if (!class_exists($class)) {
            return response()->json(['message' =>'Payment methods not exist.']);
        }
        $deposit = (new $class)->success($request);

        return redirect(url('/member/dashboard/financial/wallet/deposit'));
    }

    public function fail(Request $request, $method)
    {
        $class = config("wallet.payment-methods.$method");

        if (!class_exists($class)) {
            return response()->json(['message' =>'Payment methods not exist.']);
        }


        $deposit = (new $class)->fail($request);


        return redirect(url('/member/dashboard/financial/wallet/deposit'));
    }

    public function status(Request $request, $method)
    {
        $class = config("wallet.payment-methods.$method");

        if (!class_exists($class)) {
            return response()->json(['message' =>'Payment methods not exist.']);
        }

        $deposit = (new $class)->status($request);
        return response()->json($deposit);
    }

}
