<?php

namespace App\Http\Controllers\Admin;

use App\Package;
use Fxtutor\Wallet\Plan;
use App\PermissionService;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;

class PackageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        $packages = Plan::orderBy('id', 'desc')->get();
        $counts = Plan::serviceWiseCount();
        $permissions = Permission::addSelect([
                                                'service' => PermissionService::addSelect(['service'])
                                                                                ->whereColumn('permission_id', 'permissions.id')
                                            ])
                                    ->where('guard_name', 'member')
                                    ->get()
                                    ->groupBy('service');

        return view('admin.packages.packages', compact(['packages', 'counts', 'permissions']));
    }

    public function show ($package)
    {
        $permissions = Permission::addSelect([
                                                'service' => PermissionService::addSelect(['service'])
                                                                                    ->whereColumn('permission_id', 'permissions.id')
                                                ])
                                        ->where('guard_name', 'member')
                                        ->get()
                                        ->groupBy('service');
        
        $packages = Plan::where('service', '=', 'App\\'.ucfirst($package))->orderBy('id', 'desc')->get();
        return view('admin.packages.show-packages', compact(['packages', 'permissions']));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'     => 'required',
            'service'   => 'required',
            'duration'  => 'required',
            // 'price'     => 'required|numeric',
            'details'   => 'required',
            'permissions' => 'required'
        ]);
        
        $data = [
            'name'         => $request->name,
            'service'       => $request->service,
            'duration'      => $request->duration,
            'price'         => $request->price,
            'recursive'     => $request->recursive,
            // 'discount'      => $request->discount,
            'orders'        => $request->orders,
            'icon'          => $request->icon,
            'note'          => $request->note,
            'settings'      => [
                'billing' => $request->duration,
                'tax' => $request->tax,
                'permissions' => $request['permissions'],
                'security_deposit' => $request['security_deposit'],
                'company_share' => $request['company_share'],
                'enable_affiliate' => $request['enable_affiliate'],
                'affiliate' => $request['affiliate']
            ],
            // 'public_id'     => $publicId,
            'details'       => json_decode($request->details),
            'created_by'    => Auth::guard('admin')->user()->id,
        ];

        $packages = Plan::create($data);

        return response()->json($packages, 201);
    }

    public function edit ($id)
    {
        $packages = Plan::find($id);
        return response()->json($packages);
    }

    public function update (Request $request, $plan)
    {
        $this->validate($request, [
            'name'     => 'required',
            'service'   => 'required',
            'duration'  => 'required',
            'price'     => 'required|numeric',
            'details'   => 'required',
            'permissions' => 'required'
        ]);

        // $data = [
        //     'name'         => $request->name,
        //     'service'       => $request->service,
        //     'duration'      => $request->duration,
        //     'price'         => $request->price,
        //     'recursive'     => $request->recursive,
        //     // 'discount'      => $request->discount,
        //     'orders'        => $request->orders,
        //     'icon'          => $request->icon,
        //     'note'          => $request->note,
        //     'settings'      => [
        //         'billing' => $request->duration,
        //         'tax' => $request->tax,
        //         'permissions' => $request['permissions']
        //     ],
        //     // 'public_id'     => $publicId,
        //     'details'       => json_decode($request->details),
        //     'updated_by'    => Auth::guard('admin')->user()->id,
        // ];

        // Plan::where('id', $plan->id)->update($data);

        // dd($data);
        $plan = Plan::find($plan);
        $plan->name = $request->name;
        $plan->service = $request->service;
        $plan->duration = $request->duration;
        $plan->price = $request->price;
        $plan->recursive = $request->recursive;
        $plan->orders = $request->orders;
        $plan->icon = $request->icon;
        $plan->note = $request->note;
        $plan->settings = [
                            'billing' => $request->duration,
                            'tax' => $request->tax,
                            'permissions' => $request['permissions'],
                            'security_deposit' => $request['security_deposit'],
                            'company_share' => $request['company_share'],
                            'enable_affiliate' => $request['enable_affiliate'],
                            'affiliate' => $request['affiliate']
                        ];
        $plan->details = json_decode($request->details);
        $plan->updated_by = Auth::guard('admin')->user()->id;

        $plan->save();

        return response()->json(['message'=>'Package update successful']);
    }

    public function active($id)
    {
        $approved = Plan::find($id);
        $approved->status = 1;
        $approved->save();
        return redirect()->back()->with('message', 'Package has been Active');

    }

    public function inactive($id)
    {
        $revoke = Plan::find($id);
        $revoke->status = 0;
        $revoke->save();
        return redirect()->back()->with('message', 'Package has been Inactive');

    }

    public function delete($id)
    {
        $packages_delete = Plan::find($id);
        $packages_delete->delete();
        return redirect()->back()->with('message', 'Package has been Deleted');
    }

    public function permission(Request $request)
    {
        if (!$request->has('service')) {
            return response()->json(["error" => "Bad Request"], 400);
        }

        $guard = strtolower(str_replace('App\\', '', $request->service));

        return \Spatie\Permission\Models\Permission::select(['id', 'name', 'guard_name'])->where('guard_name', $guard)->get();
    }
}
