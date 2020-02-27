<?php

namespace App\Http\Controllers\Admin;

use Validator;
use App\Signal;
use App\Package;
use App\Category;
use App\Currency;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class SignalController extends Controller
{
    public function index()
    {
        $categories = Category::select(['id', 'name'])->whereService(Signal::class)->get();
        $packages = Package::select(['id', 'title', 'duration', 'price'])->whereService(Signal::class)->whereStatus(1)->get();
        $plans = DB::table('plans')->whereService(Signal::class)->get();
        $currencies = Currency::all();

        $signals = Signal::where('status' ,'=', Signal::status('active'))->with('currency')->orderBy('id', 'desc')->get();
        $trash_signals = Signal::with('currency')->onlyTrashed()->get();
        $cancel_signals = Signal::where('status', '=', Signal::status('cancel'))->with('currency')->get();
        $expire_signals = Signal::where('status', '=', Signal::status('expired'))->with('currency')->get();
        $fill_signals = Signal::where('status', '=', Signal::status('filled'))->with('currency')->get();

        return view('admin.signal.list',compact('categories', 'plans','packages', 'currencies', 'signals', 'trash_signals', 'cancel_signals', 'expire_signals', 'fill_signals'));
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'category_id' => 'required',
            'currency_id' => 'required',
            'type'        => 'required',
            'signal_time' => 'required',
            'price'       => 'required',
            'take_profit' => 'required',
            'stop_loss'   => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $attachment = null;
        if($request->has('attachment')) {
            $attachment = \FileUpload::upload('signal', $request['attachment']);
        }
      
        $signal = Signal::create([
            'category_id' =>    $request->category_id,
            'currency_id' =>    $request->currency_id,
            'type'        =>    Signal::types($request->type),
            'signal_time' =>    new Carbon($request->signal_time),
            'valid_till'  =>    !is_null($request->valid_till) ? new Carbon($request->valid_till) : null,
            'price'       =>    $request->price,
            'take_profit' =>    $request->take_profit,
            'stop_loss'   =>    $request->stop_loss,
            'attachment'  =>    $attachment,
            'notes'       =>    $request->notes,
            'free'        =>    $request->free,
            'premium'     =>    $request->premium,
            'package_id'  =>    $request->package_id
        ]);

        $subject = "New " . $signal->currency->name . " " . $request->signal_type_display . " Trade @" . $request->price;
        \SignalNotifier::sentMail($signal, $subject, true);

        return $signal;
    }

    public function show($signal)
    {
        return Signal::with('currency')->find($signal);
    }

    public function edit(Signal $signal)
    {
        return $signal;
    }

    public function update(Request $request, Signal $signal)
    {
  
        $validator = Validator::make($request->all(), [
            'category_id' => 'required',
            'currency_id' => 'required',
            'type'        => 'required',
            'signal_time' => 'required',
            'price'       => 'required',
            'take_profit' => 'required',
            'stop_loss'   => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $update_signal = $signal->attachment;
        if($request->has('attachment')) {
            \FileUpload::remove('signal', $update_signal);
            $update_signal = \FileUpload::upload('signal', $request->file('attachment'));
        }


        $signal->update([
            'category_id' =>     $request->category_id,
            'currency_id' =>     $request->currency_id,
            'type'        =>     Signal::types($request->type),
            'signal_time' =>     new Carbon($request->signal_time),
            'valid_till'  =>     !is_null($request->valid_till) ? new Carbon($request->valid_till) : '',
            'price'       =>     $request->price,
            'take_profit' =>     $request->take_profit,
            'stop_loss'   =>     $request->stop_loss,
            'attachment'  =>     $update_signal,
            'notes'       =>     $request->notes,
            'free'        =>     $request->free,
            'premium'     =>     $request->premium,
            'package_id'  =>     $request->package_id
        ]);

        
        $subject = "Attention! We have Modified " . $signal->currency->name;
        $subject .= " " . $signal->signal_type_display;
        $subject .= " Trade";

        \SignalNotifier::sentMail($signal, $subject);

        return response()->json(['message' => 'Data successfully updated.'], 200);
    }

    public function delete($id)
    {
        Signal::destroy($id);
        return redirect(url('admin/signals'))->with('message','Your signal moved to trash');
    }

    public function restore($signal)
    {
        $signal = Signal::withTrashed()->where('id', $signal);
        $signal->restore();
        return back()->with('message','Your signal restored successfully.');
    }

//    public function destroy($id)
//    {
//        Signal::where('id',$id)->forceDelete();
//        return redirect(url('admin/signals/trash'))->with('message','Your signal deleted.');
//    }

    public function fill(Request $request, Signal $signal)
    {
        $this->validate($request, [
            'pips' => 'required',
            'profit' => 'required',
        ]);
        $signal->pips = $request->pips;
        $signal->profit = $request->profit;
        $signal->notes = $request->notes;
        $signal->status = 'filled';
        $signal->save();

        $subject = $signal->currency->name;
        $subject .= " " . $signal->type;
        $subject .= " Trade closed with ";
        $subject .= $request->profit == 0 ? '-' : '+';
        $subject .= $request->pips . " Pips ";
        $subject .= $request->profit == 0 ? 'Loss!' : 'Profit!';

        \SignalNotifier::sentMail($signal, $subject);

        return response()->json([], 204);
    }

    public function cancel(Signal $signal)
    {
        $signal->status = 'cancel';
        //dd($signal);
        $signal->save();

        $subject = $signal->currency->name;
        $subject .= " " . $signal->type;
        $subject .= " Trade canceled";

        \SignalNotifier::sentMail($signal, $subject);

        return redirect()->back()->with('message', 'Your signal is cancel');
    }

    public function expire(Signal $signal)
    {
        $signal->status = 'expired';
        $signal->save();

        $subject = $signal->currency->name;
        $subject .= " " . $signal->signal_type;
        $subject .= " Trade expired";

        \SignalNotifier::sentMail($signal, $subject);

        return redirect()->back()->with('message', 'Your signal is expired');
    }

    public function trashSignalList()
    {
        $signals = Signal::with('currency')->onlyTrashed()->get();
        return view('admin.signal.trash_list',compact('signals'));
    }
}
