<?php
namespace Fxtutor\Wallet\Subscriptions;

use PayPal\Common\PayPalResourceModel;

/**
 * Class PerfectMoney.
 */
class Paypal
{
    public function createProduct()
    {
        $payload = [
            'name'        => 'Video Streaming Service',
            'description' => 'Video streaming service',
            "type"        => "SERVICE",
            "category"    => "SOFTWARE",
            "image_url"   => "https://example.com/streaming.jpg",
            "home_url"    => "https://example.com/home"
        ];

        $response = PayPalResourceModel::executeCall(
            '/v1/catalogs/products',
            'POST',
            $payload,
            null,
            $this->getCredential()
        );

        return json_decode($response, true);
    }


    public function cretePlane()
    {
        $payload = [
            
                "product_id" => "PROD-6XB24663H4094933M",
                "name" => "Basic Plan",
                "description" => "Basic plan",
                "billing_cycles"=> [
                    [
                        "frequency" => [
                            "interval_unit"=> "MONTH",
                            "interval_count"=> 1
                        ],
                        "tenure_type"=> "TRIAL",
                        "sequence"=> 1,
                        "total_cycles"=> 1
                    ],
                    [
                        "frequency"=> [
                            "interval_unit"=> "MONTH",
                            "interval_count"=> 1
                        ],
                        "tenure_type"=> "REGULAR",
                        "sequence"=> 2,
                        "total_cycles"=> 12,
                        "pricing_scheme"=> [
                            "fixed_price"=> [
                                "value"=> "10",
                                "currency_code"=> "USD"
                            ]
                        ]
                    ]
                ],
                "payment_preferences"=> [
                    "auto_bill_outstanding" => true,
                    "setup_fee"=> [
                        "value"=> "10",
                        "currency_code"=> "USD"
                    ],
                    "setup_fee_failure_action"=> "CONTINUE",
                    "payment_failure_threshold"=> 3
                ]
            ];
    }



    /**
     * get Credintioals
     *
     * @return \PayPal\Auth\OAuthTokenCredential
     *
     * getRequestHeaders
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
