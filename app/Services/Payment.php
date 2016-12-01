<?php

namespace App\Service;


use App\Models\Package;

class Payment
{

    public function getDokuParameters(array $personalData, array $orderData)
    {
        $mallId = config('doku.doku.mall_id');
        $sharedKey = config('doku.doku.shared_key');
        $amount = number_format($orderData['grandTotal'], 2, '.', '');
        // $amount = number_format(75000, 2, '.', '');
        $basket = $this->generateDokuBasket($orderData);
        $transId = strtotime("now");
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
            'NAME'             => $personalData['order_name'],
            'EMAIL'            => $personalData['order_email'],
            'MOBILEPHONE'      => $personalData['order_phone'],
            'BASKET'           => $basket,
            // 'BASKET'           => 'Item 1,70000.00,1,70000.00;Service Charge,5000.00,1,5000.00;',
        ];

        return $params;
    }

    public function getOrderDetails($request, $lang)
    {
        $packages = $request['packages'];
        $orders = [];
        $subTotal = 0;
        $grandTotal = 0;
        foreach ($packages as $packageId => $value) {
            $package = Package::find($packageId);
            $packageDetail = $package->details()->where('lang', $lang)->first();
            $price = $value * $package->normal_price;
            $orders['orders'][] = [
                'packageName' => $packageDetail->title,
                'qty' => $value,
                'price' => $package->normal_price,
                'total' => $price
            ];
            $subTotal += $price;
        }
        $tax = 0.1 * $subTotal;
        $orders['subTotal'] = $subTotal;
        $orders['tax'] = $tax;
        $orders['grandTotal'] = $subTotal + $tax;

        return $orders;
    }

    private function generateDokuBasket($orderData)
    {
        $basket = '';
        $orders = $orderData['orders'];
        foreach ($orders as $order) {
            if ($order['qty'] > 0) {
                $price = number_format($order['price'], 2, '.', '');
                $total = number_format($order['total'], 2, '.', '');
                $basketData = $order['packageName'] . ',' . $price . ',' . $order['qty'] . ',' . $total;
                $basket .= ($basket == '' ? $basketData : ';' . $basketData);
            }
        }
        $taxAmount = number_format($orderData['tax'], 2, '.', '');
        $tax = 'Service + 10% PB1 Tax,' . $orderData['tax'] . ',1,' . $taxAmount;
        $basket .= ($basket == '' ? $tax : ';' . $tax);

        return $basket;
    }


}