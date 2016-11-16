<?php

namespace App\Service;


class Payment
{

    public function getDokuParameters()
    {
        $mallId = config('doku.doku.mall_id');
        $sharedKey = config('doku.doku.shared_key');
        $amount = number_format(75000, 2, '.', '');
        $transId = '1';
        $words = sha1(trim($amount) . trim($mallId) .  trim($sharedKey) . trim($transId));
        $idrCurrency = '360';
        // $words = '16c2b05017c04f6e650167947876f0fa2d8ab908';

        $params = [
            'MALLID'           => $mallId,
            'CHAINMERCHANT'    => 'NA',
            'AMOUNT'           => $amount,
            'PURCHASEAMOUNT'   => $amount,
            'TRANSIDMERCHANT'  => $transId,
            'WORDS'            => $words,
            'REQUESTDATETIME'  => date('YmdHis'),
            'CURRENCY'         => $idrCurrency,
            'PURCHASECURRENCY' => $idrCurrency,
            'SESSIONID'        => md5(url('')),
            'PAYMENTCHANNEL'   => "",
            'NAME'             => 'Pasha Mahardika',
            'EMAIL'            => 'pasha.md5@gmail.com',
            'HOMEPHONE'        => '0215150111',
            'MOBILEPHONE'      => '085694512313',
            'BASKET'           => 'Item 1,70000.00,1,70000.00;Service Charge,5000.00,1,5000.00;',
            'ADDRESS'          => 'Plaza Asia Office Park Unit 3 Kav 59',
            'CITY'             => 'Jakarta',
            'STATE'            => 'DKI Jakarta',
            'ZIPCODE'          => '12190'
        ];

        return $params;
    }
}