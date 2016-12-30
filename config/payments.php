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
        'api_url' => 'https://payment.e2pay.co.id/epayment/entry.asp',
        'requery_url' => 'https://payment.e2pay.co.id/epayment/enquiry.asp',
        'redirect_url' => 'cimb/result',
        'backend_url' => 'cimb/backend'
    ]

];