<?php
namespace Fxtutor\Wallet\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Fxtutor\Wallet\Plan;

class PlanController extends Controller
{
    public function index()
    {
        return Plan::withCount('subscriptions')->get();
    }

    public function store(Request $request)
    {
        $this->validate($request,
            [
                'name'    => 'required|string|min:5|max:255|unique:subscription_plans,name',
                'service'  => 'required',
                'price'  => 'required',
            ]
        );

        $plan = Plan::create($request->all());

        return $plan;
    }

    public function show(Request $request, Plan $plan)
    {
        return $plan;
    }

    

    public function update(Request $request, Plan $plan)
    {
        $this->validate($request,
            [
                'name'    => "nullable|string|min:5|max:255|unique:subscription_plans,name,$plan->id",
            ]
        );
        $plan->update($request->all());
        return $plan;
    }

    public function destroy(Plan $plan)
    {
        $plan->delete();

        return response()->json(['success' => true, 'message'=> 'Plan delete successfully.']);
    }
}