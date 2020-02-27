<?php

namespace App\Http\Controllers\Frontend;

use Fxtutor\Wallet\Plan;
use Illuminate\Support\Str;
use Fxtutor\Wallet\Subscription;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class SubscriptionController extends Controller
{

    public function __construct()
    {
        // dd(auth()->guard('member')->check());
    }

    public function subscription($service, $plan)
    {
        $plan = Plan::where('id', $plan)->active()->first();
        if ($plan) {
            $serviceNameSpace = 'App\\' . Str::studly($service);
            if ($plan->service === 'App\\Signal') {
                if (auth()->guard('member')->check()) {
                    $isSubscribed = Subscription::where('service', $serviceNameSpace)->where('member_id', auth()->guard('member')->user()->id)->count() > 0;
                    if ($isSubscribed) {
                        Session::flash('message-info', "You already subscribe to a signal package");
                        return redirect('/member/dashboard/' . $service);
                    }
                }
            }
            
            $plans = Plan::where('service', $serviceNameSpace)->active()->get();
            return view('frontend.subscription.index', compact('plans'));
        }
        return redirect('/')->with('message', 'You can not subscribe to this package');
    }
}