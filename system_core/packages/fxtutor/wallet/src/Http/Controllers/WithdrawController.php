<?php

namespace Fxtutor\Wallet\Http\Controllers;

use Fxtutor\Wallet\Withdraw;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class WithdrawController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $status = $request->input('status');
        $withdraw = Withdraw::query();

        if ($status) {
            $withdraw = $withdraw->where('status', $status);
        }
        $withdraw = $withdraw->get();

        return response()->json($withdraw);
        // return view('admin::subscription.withdraw.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->only([
            'method',
            'amount',
            'currency',
        ]);

        $data['member_id'] = $request->user()->id;
        $data['process_fee'] = 0;
        $data['total'] = floatval($data['amount']) + floatval($data['process_fee']);

        $data['meta'] = [
            'remark' => $request->get('remerk')
        ];

        $withdraw = Withdraw::create($data);

        return response()->json($withdraw);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Withdraw $withdraw)
    {
        return response()->json($withdraw);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Withdraw $withdraw)
    {
        $withdraw->update($request->all());

        return response()->json($withdraw);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Withdraw $withdraw)
    {
        $withdraw->delete();
        return response()->json(['success' => true]);
    }
}
