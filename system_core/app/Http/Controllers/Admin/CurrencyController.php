<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Uploader\FileUpload;
use Illuminate\Http\Request;
use App\Currency;
use App\Signal;
use Illuminate\Support\Facades\Validator;
use DB;
class CurrencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $currencies = Currency::orderBy('id', 'desc')->get();
        return view('admin.currency.list', compact('currencies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:currencies,name',
            'icon' => '',
            'logo' => ''
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $logo = null;
        if ($request->has('logo')) {
            $logo = \FileUpload::upload('currency', $request['logo'], ['currency']);
        }

        $currency = new Currency();
        $currency->name = $request->name;
        $currency->icon = $request->icon;
        $currency->logo = $logo;

        $currency->save();

        return response()->json(['message' => 'Data successfully inserted.'], 201);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Currency $currency)
    {
        return $currency;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Currency $currency)
    {
        //dd($request->all());
        //dd();

        $validator = Validator::make($request->all(), [
            'name' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

//        $currency_logo = $currency->logo;
//        if ($request->hasFile('logo') && !is_null($currency_logo)) {
//            \FileUpload::remove('currency', $currency_logo['logo'], ['currency']);
//            $currency_logo = \FileUpload::upload('currency', $request->file('logo'), ['currency']);
//        }
        //$currency_logo = null;
        if($request->has('logo')) {
            $update_currency = $currency->logo;
            \FileUpload::remove('currency', $update_currency);
            $update_currency = \FileUpload::upload('currency', $request->file('logo'), ['currency']);
        }

        $currency->update([
            'name' => $request->name,
            'icon' => $request->icon,
            'logo' => $update_currency
        ]);


        return response()->json(['message' => 'Data successfully updated.'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Currency::where('id', $id)->forceDelete();
        return redirect()->back()->with('message', 'Currency Parmanently Deleted');
    }

    public function delete(Currency $currency)
    {
        $signal = Signal::where('currency_id', $currency->id);

        if($signal->exists()) {
            return redirect()->back()->with('warning', 'Sorry You can\'t delete this.Currency id already Used');
        }

        $currency->delete();

        return redirect()->back()->with('message', 'Your Delete Currency Move to Trash List');
    }

    public function trashCurrencyList()
    {
        $trash_currency = DB::table('currencies')
	        ->whereNotNull('deleted_at')
            ->get();
        return view('admin.currency.trash_list', compact('trash_currency'));
    }

    public function restore($currency)
    {
        $currency = Currency::onlyTrashed()->where('id', $currency);
        $currency->restore();
        return redirect()->back()->with('message', 'Currency has been successfully Restore Please Check Currency List');
    }

    private function notFoundMessage()
    {
        return [
            'code' => 404,
            'message' => 'Note not found',
            'success' => false,
        ];
    }
    private function successulMessage($code, $message, $status, $count, $payload)
    {
        return [
            'code' => $code,
            'message' => $message,
            'success' => $status,
            'count' => $count,
            'data' => $payload,
        ];
    }
}
