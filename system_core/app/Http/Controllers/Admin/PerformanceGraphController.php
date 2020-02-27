<?php

namespace App\Http\Controllers\Admin;

use Validator;
use App\Member;
use App\Copytrade;
use Carbon\Carbon;
use App\FundManagement;
use Fxtutor\Wallet\Plan;
use App\PerformanceGraph;
use Illuminate\Http\Request;
use Faker\Provider\ar_JO\Person;
use Fxtutor\Wallet\Subscription;
use App\Http\Controllers\Controller;

class PerformanceGraphController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $performance_graphs = PerformanceGraph::orderBy('id', 'desc')->get();
        $members =  Member::all();
        $counts = PerformanceGraph::serviceWiseCount();
        return view('admin.performance_graph.index');
        // return view('admin.performance_graph.list', compact('performance_graphs', 'members', 'counts'));
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
            'value' => 'required',
            'plan' => 'required',
            'service' => 'required',
            'status' => 'required'
        ];
        if ($request->service === 'copytrade') {
            $service = 'App\\Copytrade';
        }
        if ($request->service === 'fund-management') {
            $validationRule['member_id'] = 'required';
            $service = 'App\\FundManagement';
        }

        $validator = Validator::make($request->all(), $validationRule);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $profit = !$request->has('profit') ? 0 : $request->profit;

        $dataToBeStored = [
            'service'   =>  $service,
            'date'      =>  new Carbon($request->date),
            'value'     =>  $request->value,
            'profit'    =>  $profit,
            'package_id' => $request->plan,
            'status'    =>  $request->status,
            'is_notified' => $request->notify
        ];

        if ($request->has('member_id')) {
            $dataToBeStored['member_id'] = $request->member_id;
        }

        $graph = PerformanceGraph::create($dataToBeStored);

        $subject = "Performance Graph notification for ";
        $subject .= ucfirst($graph->package->name) . " " . str_replace("App\\", "", $graph->service);
        $subject .= " Plan in " . $graph->month . ", " . $graph->year;

        \PerformanceGraphNotifier::sentMail($graph, $subject);

        if ($request->service === 'copytrade') {
            $graph = PerformanceGraph::with('package')->where('id', '=', $graph->id)->orderBy('id', 'desc')->first();
        }

        if ($request->service === 'fund-management') {
            $graph = PerformanceGraph::with(['package', 'member'])->where('id', '=', $graph->id)->orderBy('id', 'desc')->first();
        }
        
        return response()->json($graph, 201);
    }

    public function notify(PerformanceGraph $graph)
    {
        $subject = "Performance Graph notification for ";
        $subject .= ucfirst($graph->package->name) . " " . str_replace("App\\", "", $graph->service);
        $subject .= " Plan in " . $graph->month . ", " . $graph->year;

        \PerformanceGraphNotifier::sentMail($graph, $subject);

        $graph->is_notified = true;
        $graph->save();

        $graph = PerformanceGraph::with(['member', 'package'])->where('id', $graph->id)->first();

        return response()->json($graph, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($service)
    {
        if ($service === 'copytrade') {
            $graphs = PerformanceGraph::with('package')->where('service', '=', 'App\\Copytrade')->orderBy('id', 'desc')->get();
        }
        if ($service === 'fund-management') {
            $graphs = PerformanceGraph::with(['member', 'package'])->where('service', '=', 'App\\FundManagement')->orderBy('id', 'desc')->get();
        }
        
        return response()->json($graphs, 200);
        // $members =  Member::all();
        // $graphs = PerformanceGraph::where('service', '=', 'App\\'.ucfirst($graph))->orderBy('id', 'desc')->get();
        // return view('admin.performance_graph.show_graph', compact('graphs', 'members'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(PerformanceGraph $graph)
    {
        return $graph;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PerformanceGraph $graph)
    {
        $validationRule = [
            'date' => 'required',
            'value' => 'required',
            'plan' => 'required',
            'service' => 'required',
            'status' => 'required'
        ];

        if ($request->service === 'copytrade') {
            $service = 'App\\Copytrade';
        }
        if ($request->service === 'fund-management') {
            $validationRule['member_id'] = 'required';
            $service = 'App\\FundManagement';
        }

        $validator = Validator::make($request->all(), $validationRule);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $profit = !$request->has('profit') ? 0 : $request->profit;

        $dataToBeStored = [
            'service'   =>  $service,
            'date'      =>  new Carbon($request->date),
            'value'     =>  $request->value,
            'profit'    =>  $profit,
            'package_id' => $request->plan,
            'status'    =>  boolval($request->status)
        ];

        if ($request->has('member_id')) {
            $dataToBeStored['member_id'] = $request->member_id;
        }
        
        $graph->update($dataToBeStored);

        if ($request->service === 'copytrade') {
            $graph = PerformanceGraph::with('package')->where('id', '=', $graph->id)->orderBy('id', 'desc')->first();
        }
        
        if ($request->service === 'fund-management') {
            $graph = PerformanceGraph::with(['package', 'member'])->where('id', '=', $graph->id)->orderBy('id', 'desc')->first();
        }
        
        return response()->json($graph, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function active(PerformanceGraph $graph)
    {
        $graph->update(['status' => true]);
        
        return response()->json([], 200);
    }

    public function inactive(PerformanceGraph $graph)
    {
        $graph->update(['status' => false]);

        return response()->json([], 200);
    }

    public function package(Request $request, $service) 
    {
        if ($service === 'fund-management') 
        {
            return Plan::select(['id', 'name', 'duration', 'details', 'settings'])->whereService(FundManagement::class)->whereStatus(true)->orderBy('orders')->get();
        } 
        
        if ($service === 'copytrade') {
            return Plan::select(['id', 'name', 'duration', 'price'])->whereService(Copytrade::class)->whereStatus(true)->orderBy('orders')->get();
        }
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

    public function subscribedMember($package, $service)
    {
        if ($service === 'fund-management') {
            return Subscription::with('member')->where('plan_id', $package)->where('service', FundManagement::class)->get();
            // return $member->subscriptions()->select(['id', 'name', 'duration', 'price'])->where('service', FundManagement::class)->get();
        }
    }
}
