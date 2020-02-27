<?php

namespace App\Http\Controllers\API\V1;

use Carbon\Carbon;
use App\SecurityFund;
use Fxtutor\Wallet\Plan;
use App\MetaTraderAccount;
use App\SignalDestination;
use Fxtutor\Wallet\Deposit;
use App\ContactVerification;
use Illuminate\Http\Request;
use Fxtutor\Wallet\Subscription;
use Fxtutor\Wallet\IPSubscriptionBuilder;
use Illuminate\Support\Facades\Validator;
use App\Events\SubscriptionRequestReceivedEvent;
use App\Events\SubscriptionCancelRequestReceivedEvent;

class SubscriptionController extends ApiController
{

    private $process_fee = 0;

    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function emailVerification(Request $request)
    {
        if (!$request->has('code')) {
            $verificationCode = rand(100000, 999999);
        
            $request->email;
            $contactVerification = ContactVerification::create([
                'member_id' => $request->user()->id,
                'contact' => $request->email,
                'code' => $verificationCode
            ]);

            // sent email with verification code
            // Mail::to($request->email)->send(new PremiumSignalReceivingEmailVerification($verificationCode));

            return response()->json(['message' => 'Please enter verification code that is sent to above email address.'], 201);
        }

        $contactVerification = ContactVerification::where('member_id', $request->user()->id)
                            ->where('code', $request->code);

        if ($contactVerification->count() > 0) {
            $contactVerification->update(['verified_at' => Carbon::now()]);
            
            return response()->json(['message' => 'Verification Successful'], 200);
        }

        return response('Bad Request', 400);
        
    }

    private function deposit(Request $request, Subscription $subscription)
    {
        $method = $request->input('transaction_method');
        $class = config("wallet.payment-methods.$method");

        $validator = Validator::make($request->all(), [
            'transaction_method' => 'required',
            'transaction_amount' => 'required|numeric',
            'process_fee' => 'nullable|numeric',
            'file' => 'nullable|mimes:jpeg,bmp,png,pdf'
        ]);

        $validator->after(function ($validator) use ($class) {
            if (!class_exists($class)) {
                $validator->errors()->add('class', 'Payment method not Support.');
            }
        })->validate();

        $amonut = $request->get('transaction_amount');
        $process_fee = $this->process_fee;
        $tax = $request->has('tax')? $request->get('tax'): 0;

        $total = floatval($amonut) + floatval($process_fee) + floatval($tax);
        $meta = [];

        if ($request->hasFile('transaction_screenshot')) {
            $screenshot = \FileUpload::upload('transaction', $request['transaction_screenshot']);
            
            $meta = [
                'upload' => $screenshot
            ];
        }

        $deposit = Deposit::create([
            'method' => $class,
            'member_id' => $request->user()->id,
            'amount' => $amonut,
            'process_fee' => $process_fee,
            'payment_id' => $request->has('transaction_id')? $request->get('transaction_id'): null,
            'tax' => $tax,
            'total' => $total,
            'meta' => $meta
        ]);

        $payment = new $class();

        if ($deposit) {
            $response =  $payment->depositRequest($deposit, $subscription->id);
            $subject = $subscription->plan->name . " " . str_replace("App\\", "", $subscription->service) . " plan subscription received";
           
            event(new SubscriptionRequestReceivedEvent($subscription->member->email, $subscription, $subject));
            return response()->json($response);
        }

        return response()->json([]);
    }

    public function subscribe(Request $request)
    {
        $this->plan = Plan::find($request->plan);

        // subscribe initialize
        $subscription = new IPSubscriptionBuilder($this->plan);
        
        if (in_array($this->plan->service, ['App\\FundManagement', 'App\\Copytrade'])) {
            $subscription->setMultipleSubscription(true);
        }

        // subscription continue
        $subscription->subscriptionStatus = Subscription::STATUS_UNPAID;
        $successMessage = "Package subscription successful";
        $subscription->skipPayment();
      
        $subscription->skipTrial();
        $createdSubscription = $subscription->create();

        // create security fund in case of fundmanagement
        if ($createdSubscription->service === 'App\FundManagement') {
            $createdSubscription->securityFund()->create([
                'amount' => $request->transaction_amount,
                'status' => SecurityFund::STATUS_UNAPPROVE
            ]);
        }

        if ($this->plan->service === 'App\Signal') {
            // signal receiving information
            SignalDestination::create([
                'subscription_id' => $createdSubscription->id,
                'email' => $request->signal_receiving_email,
                'contact' => $request->signal_receiving_contact,
                'whatsapp' => $request->signal_receiving_whatsapp,
                'telegram' => $request->signal_receiving_telegram,
                'skype' => $request->signal_receiving_skype
            ]);
            
        } else {
            // meta trader information
            MetaTraderAccount::create([
                'subscription_id' => $createdSubscription->id,
                'platform_type' => MetaTraderAccount::platform($request->meta_trader_platform_type),
                'broker_id' => $request->meta_trader_broker === 'other' ? NULL : $request->meta_trader_broker,
                'broker_name' => $request->meta_trader_broker_name,
                'broker_server_name' => $request->meta_trader_broker_server_name,
                'account_number' => $request->meta_trader_account_number,
                'password' => $request->meta_trader_password,
                'risk_preferance' => $request->meta_trader_risk_preferance ? MetaTraderAccount::risk_preferance($request->meta_trader_risk_preferance) : NULL,
                'comment' => $request->meta_trader_comment
            ]);
        }

        return response()->json($createdSubscription, 201);
    }

    public function payment(Request $request, Subscription $subscription)
    {
        if (in_array($request->transaction_method, ['paypal', 'perfect-money'])) {
            $this->process_fee = $request->get('process_fee');
        }

        if (in_array($request->transaction_method, ['paypal', 'perfect-money', 'neteller', 'skrill'])) {
            return $this->deposit($request, $subscription);
        }

        if (in_array($request->transaction_method, ['wallet'])) {

            $plan = Plan::find($subscription->plan_id);

            $newSubscripton = new IPSubscriptionBuilder($plan, $subscription->member);

            if (in_array($plan->service, ['App\\FundManagement', 'App\\Copytrade'])) {
                $newSubscripton->skipPayment();
                
                $subject = $subscription->plan->name . " " . str_replace("App\\", "", $subscription->service) . " plan subscription received";
           
                event(new SubscriptionRequestReceivedEvent($subscription->member->email, $subscription, $subject));
            }
           
            $newSubscripton->setPayableAmount($request->transaction_amount);
            $newSubscripton->setPaymentMethod($request->transaction_method);

            return $newSubscripton->payment($subscription, 'create');

            // return (new SubscriptionBuilder($plan, $subscription->member))->payment($subscription, 'create');
        }

    }

    public function subscription(Request $request)
    {
        $subscriptions = Subscription::with(['plan', 'transaction', 'securityFund'])->where('member_id', $request->user()->id)->get();
        
        return response()->json($subscriptions, 200);
    }

    public function requestCancel(Request $request, Subscription $subscription)
    {
        // add validation check
        $subscription->meta = ['cancellation_request_at' => Carbon::now()];
        $subscription->save();

        $subject = $subscription->plan->name . " " . str_replace("App\\", "", $subscription->service) . " plan subscription cancel request received";
        event(new SubscriptionCancelRequestReceivedEvent($subscription->member->email, $subscription, $subject));

        return response()->json([
                                'message' => 'Your subscription cancellation request has been received, and waiting for admin approval. After approval this subscription will not be renewed automatically. You can renew by manual action. Thank you.', 
                                'type' => 'success',
                                'subscription' => $subscription->load('plan')
                            ], 200);
    }

}
