<?php
namespace Fxtutor\Wallet\Payments;

use Carbon\Carbon;
use Fxtutor\Wallet\Deposit;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Exceptions\PerfectMoneyException;

/**
 * Class PerfectMoney.
 */
class PerfectMoney extends Payments
{
    public const DEPOSIT_ID_KEY = 'PAYMENT_ID';
    /**
     * genarate form data
     *
     * @return Array [form]
     */
    public function depositRequest(Deposit $deposit)
    {
        $config = config('wallet.diposits.perfectMoney', []);
        $viewData = [
            'form' => [
                'attr' => [
                    "action" => "https://perfectmoney.is/api/step1.asp",
                    "method" => "POST",
                ],
                'fields' => [
                    'PAYMENT_ID' => $deposit->id,
                    'PAYMENT_AMOUNT' => $deposit->amount,
                    'PAYEE_ACCOUNT' => $config['marchant_id'],
                    'PAYEE_NAME' => $config['marchant_name'],
                    'PAYMENT_UNITS' => $config['units'],
                    'PAYMENT_URL' => route('wallet.deposit.success', ['method' => 'perfect-money']),
                    'NOPAYMENT_URL' => route('wallet.deposit.fail', ['method' => 'perfect-money']),
                    'STATUS_URL' => route('wallet.deposit.status', ['method' => 'perfect-money']),
                    'PAYMENT_URL_METHOD' => 'POST',
                    'NOPAYMENT_URL_METHOD' => 'POST',
                    //'MEMO' => $memo ?: $config['suggested_memo'],
                ]
            ],
        ];

        return $viewData;
    }
    
    /**
     * This script demonstrates querying account history
     * using PerfectMoney API interface.
     *
     * @param int   $start_day
     * @param int   $start_month
     * @param null  $start_year
     * @param int   $end_day
     * @param int   $end_month
     * @param int   $end_year
     * @param array $data
     *
     * @throws PerfectMoneyException
     *
     * @return array
     */
    public function getHistory($start_day = null, $start_month = null, $start_year = null, $end_day = null, $end_month = null, $end_year = null, $data = [])
    {
        $config = config('diposits.perfectMoney', []);
        // Defaults paramiters
        $params = array_merge([
            'AccountID' => $config['account_id'],
            'PassPhrase' => $config['passphrase'],
            'startday' => $start_day ?: Carbon::now()->subYear(1)->day,
            'startmonth' => $start_month ?: Carbon::now()->subYear(1)->month,
            'startyear' => $start_year ?: Carbon::now()->subYear(1)->year,
            'endday' => $end_day ?: Carbon::now()->day,
            'endmonth' => $end_month ?: Carbon::now()->month,
            'endyear' => $end_year ?: Carbon::now()->year,
        ], Arr::only($data, ['payment_id', 'batchfilter', 'counterfilter', 'metalfilter']));


        if (isset($data['oldsort']) &&
            in_array(
                strtolower($data['oldsort']),
                ['tstamp', 'batch_num', 'metal_name', 'counteraccount_id', 'amount ']
            )
        ) {
            $params['oldsort'] = $data['oldsort'];
        }


        if (! empty($data['paymentsmade'])) {
            $params['paymentsmade'] = 1;
        }


        if (! empty($data['paymentsreceived'])) {
            $params['paymentsreceived'] = 1;
        }


        // Get data from the server
        $content = $this->post('/acct/historycsv.asp', $params);


        if (substr($content, 0, 63) == 'Time,Type,Batch,Currency,Amount,Fee,Payer Account,Payee Account') {
            $lines = explode("\n", $content);
            // Getting table names (Time,Type,Batch,Currency,Amount,Fee,Payer Account,Payee Account)
            $rows = explode(',', $lines[0]);
            $return_data = [];
            // Fetching history
            $return_data['history'] = [];
            for ($i = 1; $i < count($lines); $i++) {
                // Skip empty lines
                if (empty($lines[$i])) {
                    break;
                }
                // Split line into items
                $items = explode(',', $lines[$i]);
                // Get history items
                $history_line = [];
                foreach ($items as $key => $value) {
                    $history_line[str_replace(' ', '_', strtolower($rows[$key]))] = $value;
                }
                $return_data['history'][] = $history_line;
            }
            return $return_data;
        }
        throw new PerfectMoneyException($content);
    }

    public function validate(Request $request)
    {
        $config = config('diposits.perfectMoney', []);
        $params = [
            $request->input('PAYMENT_ID'),
            $request->input('PAYEE_ACCOUNT'),
            $request->input('PAYMENT_AMOUNT'),
            $request->input('PAYMENT_UNITS'),
            $request->input('PAYMENT_BATCH_NUM'),
            $request->input('PAYER_ACCOUNT'),
            strtoupper(md5($config['alt_passphrase'])),
            $request->input('TIMESTAMPGMT'),
        ];
        $string = implode(':', $params);
        return strtoupper(md5($string)) == $request->input('V2_HASH');
    }

    public function success(Request $request)
    {
        if ($this->validate($request)) {

            $deposit = Deposit::find($request->input('PAYMENT_ID'));

            if ($deposit) {
                $deposit->meta = ['response' => $request->all()];
                $deposit->payment_id = $request->input('PAYMENT_BATCH_NUM');
                $deposit->status = 2;
                if ($deposit->save()) {
                    $member = $deposit->member;
                    $meta = [
                        'method' => 'perfect-money',
                        'payment_id' => $request->input('PAYMENT_BATCH_NUM'),
                        'account' => $request->input('PAYMENT_AMOUNT'),
                    ];

                    if ($deposit->process_fee > 0) {
                        $member->debitTransaction('deposit_process_fee', $deposit->process_fee, $meta, $deposit, $deposit->currency);
                    }
                    $member->creditTransaction('deposit_payment_perfect_money', $deposit->total, $meta, $deposit, $deposit->currency);
                }
            }

            return $deposit;
        }
    }

    public function fail(Request $request)
    {
        $deposit = Deposit::find($request->input('PAYMENT_ID'));
        if ($deposit) {
            $deposit->meta = ['response' => $request->all()];
            $deposit->status = 3;
            $deposit->save();
        }
    }

    public function status(Request $request)
    {


        $deposit = Deposit::find($request->input('PAYMENT_ID'));

        if (!$deposit) {
            return false;
        }

        if ($deposit && $deposit->status == 'approved') {
            return true;
        }


        if ($this->validate($request)) {
            $this->success($request);
        } else {
            $this->fail($request);
            
        }

        return true;
    }
}
