<?php

namespace App\Http\Controllers\Admin;

use App\FAQ;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class FaqController extends Controller
{
    public function index ()
    {
        $counts = FAQ::serviceWiseCount();
        return view('admin.faqs.faq', compact('counts'));
    }

    public function show($faq)
    {
        $faqs = FAQ::orderBy('id', 'desc')->where('service', '=', 'App\\'.ucfirst($faq))->get();
        return view('admin.faqs.individual-faq', compact('faqs'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'service'  => 'required',
            'question' => 'required',
            'answer'  => 'required',
        ]);

        FAQ::create([
            'service' => $request->service,
            'question' => $request->question,
            'answer' => $request->answer,
            'created_by' => Auth::guard('admin')->user()->id,
        ]);

        return response()->json(['message', 'FAQ Save successfully']);

    }

    public function edit(FAQ $faq)
    {
        return $faq;
    }

    public function update (Request $request, \App\FAQ $faq)
    {
        $this->validate($request, [
            'service'  => 'required',
            'question' => 'required',
            'answer'  => 'required',
        ]);
        
        $faq->update([
            'service' => $request->service,
            'question' => $request->question,
            'answer' => $request->answer,
            'created_by' => Auth::guard('admin')->user()->id,
        ]);
        return response()->json(['message'=>'Faq update successful']);
    }

    public function active (FAQ $faq)
    {
        $faq->status = 1;
        $faq->save();
        return redirect()->back()->with('message', 'FAQ has been inactive');
    }

    public function inactive (FAQ $faq)
    {
        $faq->status = 0;
        $faq->save();
        return redirect()->back()->with('message', 'FAQ has been active');
    }

    public function delete ($id)
    {
        $delete = FAQ::find($id);
        $delete->delete();
        return redirect()->back()->with('message', 'FAQ move to trash list');
    }

    public function destroy($faq)
    {
        $delete = FAQ::where('id', $faq)->forceDelete();
        return redirect()->back()->with('message','Your FAQ Service permanently deleted.');
    }

    public function trashList($faq)
    {
        $faqs = $this->faqStringToNameSpace($faq);
        $trash_list = FAQ::whereService($faqs)->onlyTrashed()->orderBy('id', 'desc')->get();
        //dd($trash_list);
        return view('admin.faqs.trash-list', compact('trash_list'));
    }

    public function restore($faq)
    {
        $restore = FAQ::onlyTrashed()->where('id', $faq);
        $restore->restore();

        return redirect()->back()->with('message', 'Faq Service Restore Successfully Done');
    }
}
