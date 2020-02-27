<?php

namespace App\Http\Controllers\Admin;

use App\Tag;
use App\Signal;
use App\Analysis;
use App\Category;
use Fxtutor\Wallet\Plan;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Fxtutor\Wallet\Subscription;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Fxtutor\Wallet\SubscriptionBuilder;
use Illuminate\Support\Facades\Session;
use App\Repositories\AnalysisRepository;
use Fxtutor\Wallet\IPSubscriptionBuilder;
use Illuminate\Support\Facades\Validator;

class SubscriptionController extends Controller
{
    protected $repository;

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $counts = Subscription::serviceWiseCount();
        return view('admin.subscriptions.index', compact(['counts']));
    }

    public function allSignalSubscription(Request $request)
    {
        $allSignalSubscriptions = Subscription::with(['member', 'member.transactions', 'member.account', 'member.deposits', 'plan', 'transaction', 'signalDestination'])
                                                ->where('service', 'App\Signal')->orderBy('created_at', 'desc')->get();
                        
        return response()->json($allSignalSubscriptions, 200);
    }

    public function allCopytradeSubscription(Request $request)
    {
        $allSignalSubscriptions = Subscription::with(['member', 'member.transactions', 'member.account', 'member.deposits', 'plan', 'transaction', 'metaTraderAccount'])
                                                ->where('service', 'App\Copytrade')->orderBy('created_at', 'desc')->get();
                        
        return response()->json($allSignalSubscriptions, 200);
    }

    public function allFundManagementSubscription(Request $request)
    {
        $allSignalSubscriptions = Subscription::with(['member', 'member.transactions', 'member.account', 'member.deposits', 'plan', 'transaction', 'metaTraderAccount', 'securityFund'])
                                                ->where('service', 'App\FundManagement')->orderBy('created_at', 'desc')->get();
                        
        return response()->json($allSignalSubscriptions, 200);
    }

    public function show(Request $request, $service)
    {
        $subscriptions = Subscription::with(['member', 'member.transactions', 'member.account', 'plan', 'transaction'])
                                        ->where('service', '=', 'App\\'.str_replace(' ', '', ucwords(str_replace('-', ' ', $service))))
                                        ->orderBy('id', 'desc')->get();
        return view('admin.subscriptions.subscription', compact('subscriptions'));
    }

    public function deposit(Request $request, $subscription)
    {
        $subscription = Subscription::with(['member.deposits'])
                        ->where('id', $subscription)
                        ->first();
                    
        return response()->json($subscription, 200);
    }

    public function balance(Request $request, $subscription)
    {
        $subscription = Subscription::with(['member.account'])
                        ->where('id', $subscription)
                        ->first();
                    
        return response()->json($subscription, 200);
    }

    public function approve(Request $request, $subscription)
    {
        $subscription = Subscription::find($subscription);
        
        $plan = Plan::find($subscription->plan_id);
        
        $newSubscripton = new IPSubscriptionBuilder($plan, $subscription->member);
        if ($subscription->service === 'App\FundManagement') {
            $newSubscripton->setPayableAmount($subscription->securityFund->amount);
        } else {
            $newSubscripton->setPayableAmount($subscription->plan->price);
        }
        
        $newSubscripton->setPaymentMethod('wallet');
        return $newSubscripton->payment($subscription, 'create');

        // return (new SubscriptionBuilder($plan, $subscription->member))->payment($subscription, 'create');
    }

    public function cancel(Request $request, $subscription)
    {
        $subscription = Subscription::find($subscription);
        
        $plan = Plan::find($subscription->plan_id);
        
        $newSubscripton = new IPSubscriptionBuilder($plan, $subscription->member);
        return $newSubscripton->cancel($request, $subscription);
    }

    public function package(Request $request, $service) 
    {
        if ($service === 'signal') 
        {
            return Plan::select(['id', 'name', 'duration', 'details', 'price'])->whereService(Signal::class)->whereStatus(true)->orderBy('orders')->get();
        } 
        if ($service === 'copytrade') 
        {
            return Plan::select(['id', 'name', 'duration', 'details', 'price'])->whereService(Signal::class)->whereStatus(true)->orderBy('orders')->get();
        }
        if ($service === 'fund-management') 
        {
            return Plan::select(['id', 'name', 'duration', 'details', 'price'])->whereService(Signal::class)->whereStatus(true)->orderBy('orders')->get();
        }

    }

    public function member($service)
    {
        if ($service === 'copytrade') {
            $members = Subscription::with('member')
                        ->where('service', '=', 'App\\Copytrade')
                        // ->where('status', Subscription::STATUS_ACTIVE)
                        ->orderBy('id', 'desc')->get();
        }

        if ($service === 'fund-management') {
            $members = Subscription::with('member')
                        ->where('service', '=', 'App\\FundManagement')
                        // ->where('status', Subscription::STATUS_ACTIVE)
                        ->orderBy('id', 'desc')->get();
        }
        
        if ($service === 'signal') {
            $members = Subscription::with('member')
                        ->where('service', '=', 'App\\Signal')
                        // ->where('status', Subscription::STATUS_ACTIVE)
                        ->orderBy('id', 'desc')->get();
        }

        return response()->json($members, 200);
    }

    // public function subscribedMember($package, $service)
    // {
    //     if ($service === 'signal') {
    //         return Subscription::with('member')->where('plan_id', $package)->where('service', Signal::class)->get();
    //         // return $member->subscriptions()->select(['id', 'name', 'duration', 'price'])->where('service', FundManagement::class)->get();
    //     }
    // }
}
