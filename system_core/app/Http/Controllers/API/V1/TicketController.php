<?php

namespace App\Http\Controllers\API\V1;

use App\Ticket;
use App\TicketReply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

// use Exception;

class TicketController extends ApiController
{

    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index(Request $request)
    {
        return response()->json($request->user()->tickets()->with('supportDepartment')->get(), 200);
    }

    public function store(Request $request)
    {
        // return $request->all();
        $rules = [
            'subject' => 'required',
            'department' => 'required|exists:support_departments,id',
            'severity' => 'required',
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
            'support_department_id' => $request->department,
            'severity' => $request->severity,
            'subject' => $request->subject,
            'issue' => $request->message,
            'member_id' => Auth::guard('api')->user()->id
        ];

        if ($request->has('attachment')) {
            $data['attachment'] = \FileUpload::upload('support-ticket', $request->file('attachment'));
        }

        $ticket = Ticket::create($data);

        return response()->json(Ticket::with('supportDepartment')->where('id', $ticket->id)->first(), 201);

    }

    public function details(Request $request, $ticket)
    {
        return Ticket::with(['supportDepartment', 'replies', 'replies.admin', 'replies.member'])->where('id', $ticket)->orderBy('id', 'desc')->first();
    }

    public function replies(Request $request, $ticket)
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
            'member_id' => Auth::guard('api')->user()->id
        ];

        if ($request->has('attachment')) {
            $data['attachment'] = \FileUpload::upload('support-ticket', $request->file('attachment'));
        }

        $reply = $ticket->replies()->create($data);

        return response()->json(TicketReply::with(['admin', 'member'])->where('id', $reply->id)->first(), 201);
    }

    public function resolve(Request $request, $ticket)
    {
        Ticket::where('id', $ticket)->update([
            'status' => Ticket::status('resolved')
        ]);

        return response()->json([], 204);
    }

}
