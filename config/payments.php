<?php
return [

    'default' => 'doku',

    'doku' => [
        'mall_id' => '3816',
        'shared_key' => 'XFHblFdq2316',
        'api_url' => 'http://staging.doku.com/Suite/Receive',
        'url_notify' => 'doku/notify',
        'url_redirect' => 'doku/result',
        'url_review' => 'doku/review',
        'url_check_status' => 'http://staging.doku.com/Suite/CheckStatus'
    ],

    'cimb' => [
        'merchant_code' => 'IF00087',
        'merchant_key' => 'I5I4RTEike',
        'merchant_code_rp' => 'IF00087_S0001',
        'merchat_key_rp' => 'BvarC1lbRe',
        'api_url' => 'https://sandbox.e2pay.co.id/epayment/entry.asp',
        'requery_url' => 'https://sandbox.e2pay.co.id/epayment/enquiry.asp',
        'redirect_url' => 'cimb/result',
        'backend_url' => 'cimb/backend'
    ],

    'cimb_cc' => [
        'merchant_acc_no' => '00080091009057289293101',
        'txn_password' => '3nXtgITq',
        'api_url' => 'https://ipg.cimbniaga.co.id/BPG/admin/payment/PaymentWindow.jsp',
        //'requery_url' => 'https://sandbox.e2pay.co.id/epayment/enquiry.asp',
        'return_url' => 'cimb-credit-card/result',
    ]

];