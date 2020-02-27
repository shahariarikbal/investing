<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\FundManagement;
use Fxtutor\Wallet\Plan;
use Illuminate\Http\Request;
use App\MonthlyTradeStatement;
use Fxtutor\Wallet\Subscription;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Events\FundManagementMonthlyTradeStatementInvoiceEvent;

class MonthlyTradeStatementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.monthly-trade-statement.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validationRule = [
            'date' => 'required',
            'growth' => 'required',
            'amount' => 'required',
            'company_share' => 'required',
            'attachment' => 'file|mimetypes:application/pdf',
            'plan' => 'required',
            'service' => 'required',
            'status' => 'required'
        ];
        // if ($request->service === 'copytrade') {
        //     $service = 'App\\Copytrade';
        // }
        if ($request->service === 'fund-management') {
            $validationRule['member_id'] = 'required';
            $service = 'App\\FundManagement';
        }

        $validator = Validator::make($request->all(), $validationRule);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $profit = !$request->has('profit') ? 0 : $request->profit;

        $attachment = null;
        if($request->has('attachment')) {
            $attachment = \FileUpload::upload('monthly-trade-statement', $request['attachment']);
        }

        $dataToBeStored = [
            'service'       =>  $service,
            'date'          =>  new Carbon($request->date),
            'growth'        =>  $request->growth,
            'amount'        =>  $request->amount,
            'attachment'    =>  $attachment,
            'profit'        =>  $profit,
            'package_id'    =>  $request->plan,
            'status'        =>  boolval($request->status),
            'meta'          =>   [
                                    'company_share' => $request->company_share,
                                    'affiliate_commission' => $request->affiliate_commission
                                ]
        ];

        if ($request->has('member_id')) {
            $dataToBeStored['member_id'] = $request->member_id;
        }

        if ($request->status && $request->notify) {
            $dataToBeStored['is_notified'] = true;
        }

        $statement = MonthlyTradeStatement::create($dataToBeStored);

        // if ($request->service === 'copytrade') {
        //     $graph = PerformanceGraph::with('package')->where('id', '=', $graph->id)->orderBy('id', 'desc')->first();
        // }

        if ($request->status) {
            event(new FundManagementMonthlyTradeStatementInvoiceEvent($statement));
        }

        if ($request->status && $request->notify) {
            $subject = "Monthly Trade Statement notification for ";
            $subject .= ucfirst($statement->package->name) . " " . str_replace("App\\", "", $statement->service);
            $subject .= " Plan in " . $statement->month . ", " . $statement->year;

            \MonthlyTradeStatementNotifier::sentMail($statement, $subject);
        }

        if ($request->service === 'fund-management') {
            $statement = MonthlyTradeStatement::with(['package', 'member'])->where('id', '=', $statement->id)->orderBy('id', 'desc')->first();
        }
        
        return response()->json($statement, 201);
    }

    public function notify(MonthlyTradeStatement $statement)
    {
        $subject = "Monthly Trade Statement notification for ";
        $subject .= ucfirst($statement->package->name) . " " . str_replace("App\\", "", $statement->service);
        $subject .= " Plan in " . $statement->month . ", " . $statement->year;

        \MonthlyTradeStatementNotifier::sentMail($statement, $subject);

        $statement->is_notified = true;
        $statement->save();

        $statement = MonthlyTradeStatement::with(['member', 'package'])->where('id', $statement->id)->first();

        return response()->json($statement, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($service)
    {
        // if ($service === 'copytrade') {
        //     $graphs = PerformanceGraph::with('package')->where('service', '=', 'App\\Copytrade')->orderBy('id', 'desc')->get();
        // }
        if ($service === 'fund-management') {
            $graphs = MonthlyTradeStatement::with(['member', 'package'])->where('service', '=', 'App\\FundManagement')->orderBy('id', 'desc')->get();
        }
        
        return response()->json($graphs, 200);
        // $members =  Member::all();
        // $graphs = PerformanceGraph::where('service', '=', 'App\\'.ucfirst($graph))->orderBy('id', 'desc')->get();
        // return view('admin.performance_graph.show_graph', compact('graphs', 'members'));
    }

    public function update(Request $request, MonthlyTradeStatement $statement)
    {
        $validationRule = [
            'date' => 'required',
            'growth' => 'required',
            'amount' => 'required',
            'attachment' => 'nullable|file|mimetypes:application/pdf',
            'plan' => 'required',
            'service' => 'required',
            'status' => 'required'
        ];
        // if ($request->service === 'copytrade') {
        //     $service = 'App\\Copytrade';
        // }
        if ($request->service === 'fund-management') {
            $validationRule['member_id'] = 'required';
            $service = 'App\\FundManagement';
        }

        $validator = Validator::make($request->all(), $validationRule);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $profit = !$request->has('profit') ? 0 : $request->profit;

        $attachment = $statement->attachment;
        if($request->has('attachment')) {
            \FileUpload::remove('monthly-trade-statement', $attachment);
            $attachment = \FileUpload::upload('monthly-trade-statement', $request->file('attachment'));
        }

        $dataToBeUpdate = [
            
            'service'   =>  $service,
            'date'      =>  new Carbon($request->date),
            'growth'     =>  $request->growth,
            'amount'     =>  $request->amount,
            'attachment' => $attachment,
            'profit'    =>  boolval($profit),
            'package_id' => $request->plan,
            'status'    =>  boolval($request->status)
        ];

        if ($request->has('member_id')) {
            $dataToBeUpdate['member_id'] = $request->member_id;
        }
        
        $statement->update($dataToBeUpdate);

        if ($service === 'App\\FundManagement') {
            $statement = MonthlyTradeStatement::with(['member', 'package'])->where('id', '=', $statement->id)->where('service', '=', 'App\\FundManagement')->orderBy('id', 'desc')->first();
        }
        
        return response()->json($statement, 200);
    }

    public function active(MonthlyTradeStatement $statement)
    {
        $statement->status = 1;
        $statement->save();

        event(new FundManagementMonthlyTradeStatementInvoiceEvent($statement));

        return response()->json([], 200);
    }

    public function inactive(MonthlyTradeStatement $statement)
    {
        $statement->status = 0;
        $statement->save();
        return response()->json([], 200);
    }

    public function edit(MonthlyTradeStatement $statement)
    {
        return $statement;
    }

    public function attachment(MonthlyTradeStatement $statement)
    {
        return $statement;
    }

    public function package(Request $request, $service) 
    {
        if ($service === 'fund-management') 
        {
            return Plan::select(['id', 'name', 'duration', 'details'])->whereService(FundManagement::class)->whereStatus(true)->orderBy('orders')->get();
        } 
        
        // if ($service === 'copytrade') {
        //     return Plan::select(['id', 'name', 'duration', 'price'])->whereService(Copytrade::class)->whereStatus(true)->orderBy('orders')->get();
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function member($service)
    {
        // if ($service === 'copytrade') {
        //     $graphs = PerformanceGraph::with('package')->where('service', '=', 'App\\Copytrade')->orderBy('id', 'desc')->get();
        // }
        if ($service === 'fund-management') {
            $members = Subscription::with('member')
                        ->where('service', '=', 'App\\FundManagement')
                        // ->where('status', Subscription::STATUS_ACTIVE)
                        ->orderBy('id', 'desc')->get();
        }

        return response()->json($members, 200);
    }
}
