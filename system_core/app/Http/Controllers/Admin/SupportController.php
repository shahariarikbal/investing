<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Ticket;
use App\TicketReply;
use Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $open_tickets = Ticket::where('status', 1)->get();
        $answer_tickets = Ticket::where('status', 2)->get();
        $close_tickets = Ticket::where('status', 3)->get();
        $resolved_tickets = Ticket::where('status', 4)->get();
        return view('admin/support/list', compact('open_tickets', 'answer_tickets', 'close_tickets', 'resolved_tickets'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ticket = Ticket::with(['member', 'replies'=> function($q) {
                                                        $q->orderBy('id', 'desc');
                                                    }, 'replies.admin', 'replies.member'])->where('id', $id)->first();
        return view('admin.support.ticket_detail', compact('ticket'));
    }

    public function replies($ticket)
    {
        return TicketReply::with(['admin', 'member'])->where('ticket_id', $ticket)->orderBy('id', 'desc')->get();
    }

    public function createReply(Request $request, Ticket $ticket)
    {
        $rules = [
            'message' => 'required'
        ];

        if ($request->has('attachment')) {
            $rules['attachment'] = 'mimes:jpeg,png,pdf';
        }

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $data = [
            'message' => $request->message,
            'admin_id' => Auth::guard('admin')->user()->id,
            'ticket_id' => $ticket->id,
        ];

        Ticket::where('id', $ticket->id)->update([
            'status' => Ticket::status('answered')
        ]);

        if ($request->has('attachment')) {
            $data['attachment'] = \FileUpload::upload('support-ticket', $request->file('attachment'));
        }

        $reply = $ticket->replies()->create($data);

        return response()->json(TicketReply::with(['admin', 'member'])->where('id', $reply->id)->first(), 201);
    }
}
