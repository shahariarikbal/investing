<?php
namespace Fxtutor\Wallet\Payments;

use Uzzal\SslCommerz\Customer;
use Uzzal\SslCommerz\Client;
use Uzzal\SslCommerz\SessionRequest;
use Illuminate\Http\Request;
use App\Deposit;

class Sslcommerz extends Payments
{
    public const DEPOSIT_ID_KEY = 'tran_id';

    public function depositRequest(Deposit $deposit)
    {
        $data = [];
        $customer = new Customer('Mahabubul Hasan', 'mahabub@example.com', '0171xxxxx22');

        $data[SessionRequest::TOTAL_AMOUNT] = $deposit->amount;
        $data[SessionRequest::CURRENCY] = 'USD';
        $data[SessionRequest::TRANSACTION_ID] = $deposit->id;
        $data[SessionRequest::SUCCESS_URL] = route('deposit.success', ['method' => 'sslcommerz']);
        $data[SessionRequest::FAIL_URL] = route('deposit.fail', ['method' => 'sslcommerz']);
        $data[SessionRequest::CANCEL_URL] = route('deposit.fail', ['method' => 'sslcommerz']);

        $resp = Client::initSession($customer, $deposit->amount, $data);
        return [ 'redirect' => $resp->getGatewayUrl()];
    }

    public function validate(Request $request)
    {
        $id = $request->input('val_id');
        $resp = Client::verifyOrder($id);
        return $resp->getStatus() === 'VALID';
    }

    public function success(Request $request)
    {
        if ($this->validate($request)) {
            // deposit
        }
    }

    public function fail(Request $request)
    {
        return $request->all();
    }
}
