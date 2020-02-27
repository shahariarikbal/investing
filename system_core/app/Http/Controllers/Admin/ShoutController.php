<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Member;
use App\Shout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ShoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shouts = Shout::orderBy('id', 'desc')->get();
        $members = Member::orderBy('id', 'desc')->get();
        return view('admin/shout/list', compact('members', 'shouts'));
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
            'service' => 'required',
            'title' => 'required',
            'description' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $status = !$request->has('status') ? 0 : $request->status;

        return Shout::create([
            'service'       =>  $request->service,
            'title'         =>  $request->title,
            'description'   =>  $request->description,
            'status'        =>  $status,
            'member_id'     =>  $request->member_id
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Shout $shout)
    {
        return $shout;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Shout $shout)
    {
        $validator = Validator::make($request->all(), [
            'service' => 'required',
            'title' => 'required',
            'description' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $status = !$request->has('status') ? 0 : $request->status;

        $shout->update([
            'service'       =>  $request->service,
            'title'         =>  $request->title,
            'description'   =>  $request->description,
            'status'        =>  $status,
            'member_id'     =>  $request->member_id
        ]);
        return response()->json(['message' => 'Data successfully updated.'], 200);
    }

    /**
     * Remove the specified resource from storage.
     * Soft delete
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        Shout::destroy($id);
        return redirect(url('admin/shouts'))->with('message','Your shout moved to trash');
    }

    /**
     * Restore function
     *
     * @param [type] $id
     * @return void
     */
    public function restore($id)
    {
        Shout::withTrashed()->where('id', $id)->restore();
        return redirect(url('admin/shouts'))->with('message','Your signal restored successfully.');
    }

    /**
     * Permanent delete function
     *
     * @param [type] $id
     * @return void
     */
    public function destroy($id)
    {
        Shout::where('id',$id)->forceDelete();
        return redirect(url('admin/shout/trash'))->with('message','Your shout permanently deleted.');
    }

    /**
     * Shout active function
     *
     * @param Shout $shout
     * @return void
     */
    public function active(Shout $shout)
    {
        $shout->status = 1;
        $shout->save();
        return redirect()->back()->with('message', 'Your shout is active now');
    }

    /**
     * Shout inactive function
     *
     * @param Shout $shout
     * @return void
     */
    public function inactive(Shout $shout)
    {
        $shout->status = 0;
        $shout->save();
        return redirect()->back()->with('message', 'Your shout is inactive now');
    }

    /**
     * Show trash list function
     *
     * @return void
     */
    public function trashShoutList()
    {
        $trash_shouts = Shout::onlyTrashed()->get();
        $members = Member::all();
        return view('admin.shout.trash_list',compact('trash_shouts', 'members'));
    }
}
