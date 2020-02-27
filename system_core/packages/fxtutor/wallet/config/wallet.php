<?php

return [
        'multiple_account' => false,
        /**
         * Exiting payment class
         */

        'payment-methods' => [
            'perfect-money' => 'Fxtutor\Wallet\Payments\PerfectMoney',
            'paypal' => 'Fxtutor\Wallet\Payments\Paypal',
            'skrill' => 'Fxtutor\Wallet\Payments\Skrill',
            'neteller' => 'Fxtutor\Wallet\Payments\Neteller'
        ],

        'diposits' => [
            "perfectMoney" => [

                /*
                |--------------------------------------------------------------------------
                | Your Account ID
                |--------------------------------------------------------------------------
                */
            
                'account_id' => env('PM_ACCOUNTID', '100000'),
                
                /*
                |--------------------------------------------------------------------------
                | Your Account Passphrase
                |--------------------------------------------------------------------------
                */
            
                'passphrase' => env('PM_PASSPHRASE', 'your_pm_password'),
                
                /*
                |--------------------------------------------------------------------------
                | Your Marchant Account Example: "U123456"
                |--------------------------------------------------------------------------
                |
                */
            
                'marchant_id' => env('PM_MARCHANTID', 'U123456'),
                
                
                /*
                |--------------------------------------------------------------------------
                | Marchant Name Example: "My company, Inc"
                |--------------------------------------------------------------------------
                */
            
                'marchant_name' => env('PM_MARCHANT_NAME', 'Tasqers'),
                
            
                /*
                |--------------------------------------------------------------------------
                | Payment Units Supported: "USD", "EUR", "OAU"
                |---------------------------- ---------------------------------------------
                */
            
                'units' => env('PM_UNITS', 'USD'),
                
                
                /*
                |--------------------------------------------------------------------------
                | Your Account Alternate Passphrase
                |--------------------------------------------------------------------------
                */
            
                'alternate_passphrase' => env('PM_ALT_PASSPHRASE', 'your_alt_passphrase'),
            ],
            'paypal' => [
                'mode'    => env('PAYPAL_MODE','sandbox'), // Can only be 'sandbox' Or 'live'. If empty or invalid, 'live' will be used.
                'client_id' => env('PAYPAL_CLIENT_ID'),
                'secret_key' => env('PAYPAL_SECRET_KEY'),

                'settings' => array(
                    'mode' => env('PAYPAL_MODE','sandbox'),
                    'http.ConnectionTimeOut' => 30,
                    'log.LogEnabled' => true,
                    'log.FileName' => storage_path() . '/logs/paypal.log',
                    'log.LogLevel' => 'DEBUG',
                    'cache.enabled' => true,
                    'cache.FileName' => storage_path(). '/framework/cache/paypal', // for determining paypal cache directory
                    // 'http.CURLOPT_CONNECTTIMEOUT' => 30,
                    // 'http.headers.PayPal-Partner-Attribution-Id' => '123123123',
                    // 'log.AdapterFactory' => '\PayPal\Log\DefaultLogFactory',
                ),
            
                'payment_action' => 'Sale', // Can only be 'Sale', 'Authorization' or 'Order'
                'currency'       => 'USD',
                'notify_url'     => '', // Change this accordingly for your application.
                'locale'         => '', // force gateway language  i.e. it_IT, es_ES, en_US ... (for express checkout only)
                'validate_ssl'   => true, // Validate SSL when creating api client.
            ]
        ]
    ];