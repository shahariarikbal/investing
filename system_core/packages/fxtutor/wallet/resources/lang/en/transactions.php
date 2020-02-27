<?php


return [
    /**
     * All Transactions messages will be passed from here. 
     * 
     * $action will be the key and messages will be in array
     * you can pass meta variable here
     */

    'affiliate_commission' => [
        'message' => 'Affiliate commission from service :service by :user_name for :amount(:affiliate_percentage %) For Lavel :affiliate_lavel'
    ],

    'deposit_amount' => [
        'message' => 'Deposit payment from :pfrom (:pid at :pdate)'
    ],
    'deposit_payment_skrill' => [
        'message' => 'Successful Deposit via :payment_method'
    ],
    'deposit_payment_neteller' => [
        'message' => 'Successful Deposit via :payment_method'
    ],
    'deposit_payment_paypal' => [
        'message' => 'Successful Deposit via :payment_method'
    ],
    'deposit_process_fee' => [
        'message' => 'Deposit process fee for :payment_method'
    ],
    'subscription_create' => [
        'message' => ':service package subscribe with :total via :payment_method'
    ],

    'security_fund' => [
        'message' => 'Security fund for :service'
    ],

    'monthly_trade_statement_invoice_charge' => [
        'message' => ':package :service package monthly trade statement for :month, :year'
    ],
];