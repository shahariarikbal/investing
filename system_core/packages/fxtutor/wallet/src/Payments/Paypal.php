<?php
namespace Fxtutor\Wallet\Payments;

use Exception;
use Carbon\Carbon;
use PayPal\Api\Item;
use PayPal\Api\Payer;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Payment;
use PayPal\Api\ItemList;
use Fxtutor\Wallet\Deposit;
use PayPal\Api\Transaction;
use PayPal\Rest\ApiContext;
use Illuminate\Http\Request;
use PayPal\Api\RedirectUrls;
use PayPal\Api\PaymentExecution;
use PayPal\Auth\OAuthTokenCredential;
// use Fxtutor\Wallet\Events\SubscriptionPaid;
// use Fxtutor\Wallet\Events\SubscriptionCreated;
use Fxtutor\Wallet\Events\SubscriptionPaidEvent;
use Fxtutor\Wallet\Transaction as TransactionModel;

/**
 * Class PerfectMoney.
 */
class Paypal extends Payments
{
    public const DEPOSIT_ID_KEY = 'paymentId';

    public function __construct()
    {
        $this->api_context = $this->getCredential();

        parent::__construct();

        return $this;
    }


    public function depositRequest(Deposit $deposit, $subscriptionId = null)
    {
        $payer = new Payer();
        $payer->setPaymentMethod("paypal");

        $item1 = new Item();
        $item1->setName("Payment Deposit request for $deposit->id")
            ->setCurrency('USD')
            ->setQuantity(1)
            ->setSku($deposit->id) // Similar to `item_number` in Classic API
            ->setPrice($deposit->amount);

        $itemList = new ItemList();
        $itemList->setItems(array($item1));

        $details = new Details();
        $details->setShipping($deposit->process_fee)
            ->setTax($deposit->tax)
            ->setSubtotal($deposit->amount);

        $amount = new Amount();
        $amount->setCurrency("USD")
            ->setTotal($deposit->total)
            ->setDetails($details);

        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($itemList)
            ->setReferenceId($deposit->id)
            ->setDescription("Fxtutor Payment Deposit")
            ->setInvoiceNumber($deposit->id);
        
        $redirectUrls = new RedirectUrls();

        $params = ['method' => 'paypal', 'deposit_id'=>$deposit->id];
        if ($subscriptionId) {
            $params['subscription_id'] = $subscriptionId;
        }

        $redirectUrls->setReturnUrl(route('wallet.deposit.success', $params))
            ->setCancelUrl(route('wallet.deposit.fail', $params));

        $payment = new Payment();
        $payment->setIntent("sale")
            ->setPayer($payer)
            ->setRedirectUrls($redirectUrls)
            ->setTransactions(array($transaction));

        try {
            $payment->create($this->api_context);
        } catch (Exception $ex) {
        }

        
        $data = [
            'redirect' => $payment->getApprovalLink()
        ];

        return $data;
    }


    public function success(Request $request)
    {
        $paymentId = $request->input('paymentId');
        $deposit_id = $request->input('deposit_id');
        $subscription_id = $request->has('subscription_id') ? $request->input('subscription_id') : null;
        
        $payment = Payment::get($paymentId, $this->api_context);


        $execution = new PaymentExecution();
        $execution->setPayerId($request->get('PayerID'));

        try {
            $payment = $payment->execute($execution, $this->api_context);
            $paymentArr = $payment->toArray();


            if ($payment->getId()) {
                $deposit = Deposit::find($deposit_id);
    
                if ($deposit) {
                    $deposit->meta = array_merge( $deposit->meta, ['response' => $paymentArr]);

                    $deposit->payment_id = $payment->getId();
                    $deposit->status = 2;
                    if ($deposit->save()) {

                        $meta = [
                            'payment_method' => 'paypal',
                            'payment_id' => $paymentArr['id'],
                            'account' => $paymentArr['payer']["payer_info"]["email"],
                        ];

                        if ($subscription_id) {
                            $meta['subsctiption_id'] = $subscription_id;
                        }

                        $member = $deposit->member;
                        if ($deposit->process_fee > 0) {
                            $member->debitTransaction(TransactionModel::BALANCE, 'deposit_paypal_process_fee', $deposit->process_fee, $meta, $deposit, $deposit->currency);
                        }
                        
                        $member->creditTransaction(TransactionModel::BALANCE, 'deposit_payment_paypal', $deposit->total, $meta, $deposit, $deposit->currency);
                    }
                }
            }

            if ($subscription_id) {
                // fire event to apptove subscription
                event(new SubscriptionPaidEvent($subscription_id));
            }
        } catch (Exception $ex) {
            throw new Exception($ex->getMessage());
        }
    }

    public function fail(Request $request)
    {
        $deposit_id = $request->input('deposit_id');
        $deposit = Deposit::find($deposit_id);
       
        if ($deposit) {
            $deposit->meta['response'] = $request->all();
            $deposit->status = 3;
            $deposit->save();
        }
    }

    /**
     * get Credintioals
     *
     * @return \PayPal\Auth\OAuthTokenCredential
     */

    public function getCredential()
    {
        $config = config('wallet.diposits.paypal');

        $auth = new ApiContext(
            new OAuthTokenCredential(
                $config['client_id'],
                $config['secret_key']
            )
        );

        $auth->setConfig($config['settings']);
        return $auth;
    }
}
