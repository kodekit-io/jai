<?php

namespace App\Service;


use App\Models\Order;

class Payment
{

    public function getDokuParameters($orderId)
    {
        $order = Order::find($orderId);
        $grandTotal = $order->total_amount;

        $mallId = config('doku.doku.mall_id');
        $sharedKey = config('doku.doku.shared_key');
        $amount = number_format($grandTotal, 2, '.', '');
        // $amount = number_format(75000, 2, '.', '');
        $basket = $this->generateDokuBasket($order);
        $transId = $order->id;
        $words = sha1(trim($amount) . trim($mallId) .  trim($sharedKey) . trim($transId));
        $idrCurrency = '360';
        $sessionId = session()->getId();
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
            'SESSIONID'        => $sessionId,
            'PAYMENTCHANNEL'   => "",
            'NAME'             => $order->name,
            'EMAIL'            => $order->email,
            'MOBILEPHONE'      => $order->phone_number,
            'BASKET'           => $basket,
            // 'BASKET'           => 'Item 1,70000.00,1,70000.00;Service Charge,5000.00,1,5000.00;',
        ];

        return $params;
    }



    private function generateDokuBasket($order)
    {
        $basket = '';
        $details = $order->details;
        foreach ($details as $detail) {
            if ($detail['qty'] > 0) {
                $price = $detail->price;
                $packageName = $detail->product_name;
                $qty = $detail->qty;
                $total = $detail->total_price;

                $price = number_format($price, 2, '.', '');
                $total = number_format($total, 2, '.', '');

                $basketData = $packageName . ',' . $price . ',' . $qty . ',' . $total;
                $basket .= ($basket == '' ? $basketData : ';' . $basketData);
            }
        }
        $taxAmount = $order->tax;
        $taxAmount = number_format($taxAmount, 2, '.', '');
        $tax = 'Service + 10% PB1 Tax,' . $taxAmount . ',1,' . $taxAmount;
        $basket .= ($basket == '' ? $tax : ';' . $tax);

        return $basket;
    }

    public function checkDokuResult(array $request)
    {
        $orderId = $request['TRANSIDMERCHANT'];
        $paymentChannel = $request['PAYMENTCHANNEL'];
        $sessionId = $request['SESSIONID'];
        $statusCode = $request['STATUSCODE'];

        if ($sessionId == session()->getId()) {
            // cc succeed
            if ($statusCode == '0000') {
                $arr = [
                    'paymentType' => 'creditCard',
                    'orderId' => $orderId
                ];
                return $arr;
            }
            // bank transfer
            elseif ($statusCode == '5511') {
                $arr = [
                    'paymentType' => 'bankTransfer',
                    'orderId' => $orderId,
                    'paymentCode' => $request['PAYMENTCODE']
                ];
                return $arr;
            }
        }

        return false;
    }


}