<?php
namespace Fxtutor\Wallet\Http\Controllers;

use Fxtutor\Wallet\Deposit;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class DepositController extends Controller
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       $this->middleware('role:Administrator')->only(['update', 'destroy', 'adminSuccess', 'adminFail']);
        /**
         * @todo set middleware administrator for delete and update deposit
         */

    }

    public function index(Request $request)
    {
        $status = $request->input('status');
        $deposits = Deposit::query();

        if ($status) {
            $deposits = $deposits->where('status', $status);
        }

        $deposits = $deposits->get();

        return response()->json($deposits);
    }

    public function store(Request $request)
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
        $process_fee = $request->get('process_fee');
        $tax = $request->has('tax')? $request->get('tax'): 0;

        $total = floatval($amonut) + floatval($process_fee) + floatval($tax);
        $meta = [];

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $name = Str::random(36). '.'. $file->getClientOriginalExtension();
            $path = $file->storeAs('deposit', $name, 'public');
            $meta = [
                'upload' => $path
            ];
        }

        $deposit = Deposit::create([
            'method' => $class,
            'member_id' => $request->member()->id,
            'amount' => $amonut,
            'process_fee' => $process_fee,
            'payment_id' => $request->has('payment_id')? $request->get('payment_id'): null,
            'tax' => $tax,
            'total' => $total,
            'meta' => $meta
        ]);

        $payment = new $class();

        if ($deposit) {
            $response =  $payment->depositRequest($deposit);

            return response()->json($response);
        }

        return response()->json([]);
    }

    public function show(Request $request, Deposit $deposit)
    {
        return response()->json($deposit);
    }

    public function update(Request $request, Deposit $deposit)
    {
        $deposit->update($request->all());

        return response()->json($deposit);
    }

    public function destroy(Request $request, Deposit $deposit)
    {
        $deposit->delete();

        return response()->json(['success' => true]);
    }

    public function success(Request $request, $method)
    {
        $class = config("wallet.payment-methods.$method");

        if (!class_exists($class)) {
            return response()->json(['message' =>'Payment methods not exist.']);
        }
        $deposit = (new $class)->success($request);

        return redirect(url('/dashboard/wallet/deposit/'));
    }

    public function fail(Request $request, $method)
    {
        $class = config("wallet.payment-methods.$method");

        if (!class_exists($class)) {
            return response()->json(['message' =>'Payment methods not exist.']);
        }


        $deposit = (new $class)->fail($request);


        return redirect(url('/dashboard/wallet/deposit/'));
    }

    public function adminSuccess(Request $request, $deposit_id)
    {
        $rdeposit = Deposit::find($deposit_id);

        $class = $rdeposit->method;

        if (!class_exists($class)) {
            return response()->json(['message' =>'Payment methods not exist.']);
        }
        $deposit = (new $class)->success($request);

        return response()->json($deposit);
    }

    public function adminFail(Request $request, $deposit_id)
    {
        $rdeposit = Deposit::find($deposit_id);

        $class = $rdeposit->method;

        if (!class_exists($class)) {
            return response()->json(['message' =>'Payment methods not exist.']);
        }


        $deposit = (new $class)->fail($request);

        return response()->json($deposit);
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
