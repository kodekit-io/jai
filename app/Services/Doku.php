<?php

namespace App\Service;


use App\Models\DokuResponseCode;
use GuzzleHttp\Client;

class Doku
{
    protected $sharedKey;
    protected $mallId;
    /**
     * @var Order
     */
    private $orderService;
    /**
     * @var DokuResponseCode
     */
    private $dokuResponseCode;

    /**
     * Doku constructor.
     * @param Order $orderService
     * @param DokuResponseCode $dokuResponseCode
     */
    public function __construct(Order $orderService, DokuResponseCode $dokuResponseCode)
    {
        $this->orderService = $orderService;
        $this->mallId = config('payments.doku.mall_id');
        $this->sharedKey = config('payments.doku.shared_key');
        $this->dokuResponseCode = $dokuResponseCode;
    }

    public function getDokuParameters($orderId)
    {
        $order = $this->orderService->getOrderById($orderId);
        $grandTotal = $order->total_amount;

        $amount = number_format($grandTotal, 2, '.', '');
        // $amount = number_format(75000, 2, '.', '');
        $basket = $this->generateDokuBasket($order);
        $transId = $order->id;
        $words = sha1(trim($amount) . trim($this->mallId) .  trim($this->sharedKey) . trim($transId));
        $idrCurrency = '360';
        $sessionId = session()->getId();
        // $words = '16c2b05017c04f6e650167947876f0fa2d8ab908';

        $params = [
            'MALLID'           => $this->mallId,
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

    public function checkDokuResult(Request $request)
    {
//        var_dump($request->all()); exit();
        $words = ( $request->has('WORDS') ? $request->get('WORDS') : '' );
        $amount = ( $request->has('AMOUNT') ? $request->get('AMOUNT') : '' );
        $orderId = ( $request->has('TRANSIDMERCHANT') ? $request->get('TRANSIDMERCHANT') : '' );
        $statusCode = ( $request->has('STATUSCODE') ? $request->get('STATUSCODE') : '' );
//        Log::warning('requests => ' . implode(', ', $request->all()));
//        Log::warning('$words ==> ' . $words);
//        Log::warning('$amount ==> ' . $amount);
//        Log::warning('$this->sharedKey ==> ' . $this->sharedKey);
//        Log::warning('$orderId ==> ' . $orderId);
//        Log::warning('$statusCode ==> ' . $statusCode);
        $wordsGenerated = sha1($amount . $this->sharedKey . $orderId . $statusCode);
//        Log::warning('words generated ==> ' . $wordsGenerated);
        if ($words == $wordsGenerated) {
            $paymentChannel = ( $request->has('PAYMENTCHANNEL') ? $request->get('PAYMENTCHANNEL') : '' );
            $sessionId = ( $request->has('SESSIONID') ? $request->get('SESSIONID') : '' );
//            Log::warning('$paymentChannel ==> ' . $paymentChannel);
//            Log::warning('$sessionId ==> ' . $sessionId);
            if ($amount != '' && $orderId != '' && $sessionId != '') {
//                Log::warning('$statusCode ==> ' . $statusCode);
                // check for atm transfer
                if (in_array($paymentChannel, [5,7,14])) {
                    if ($statusCode = '0000') {
                        // succeed
                        $arr = [
                            'paymentType' => 'bankTransfer',
                            'orderId' => $orderId,
                            'paymentCode' => $request['PAYMENTCODE'],
                            'message' => 'SUCCEED'
                        ];
                        return $arr;
                    } else {
                        // transaction failed
                        $arr = [
                            'paymentType' => 'bankTransfer',
                            'orderId' => $orderId,
                            'paymentCode' => $request['PAYMENTCODE'],
                            'message' => $this->getDokuResponse($statusCode)
                        ];
                    }
                } else {
                    if ($statusCode == '0000') {
                        // succeed
                        $arr = [
                            'paymentType' => 'creditCard',
                            'orderId' => $orderId,
                            'paymentCode' => $request['PAYMENTCODE'],
                            'message' => 'SUCCEED'
                        ];
                        return $arr;
                    } else {
                        // transaction failed
                        $arr = [
                            'paymentType' => 'creditCard',
                            'orderId' => $orderId,
                            'paymentCode' => $request['PAYMENTCODE'],
                            'message' => $this->getDokuResponse($statusCode)
                        ];
                    }
                }
            } else {
                //transaction not found
                $arr = [
                    'paymentType' => '',
                    'orderId' => '',
                    'paymentCode' => '',
                    'message' => 'TRANSACTION NOT FOUND'
                ];
            }
        } else {
            $arr = [
                'paymentType' => '',
                'orderId' => '',
                'paymentCode' => '',
                'message' => 'TRANSACTION FAILED'
            ];
        }

        return $arr;
    }

    private function getDokuResponse($paymentCode)
    {
        $codeQuery = $this->dokuResponseCode->where('code', $paymentCode);
        if ($codeQuery->count() > 0) {
            $code = $codeQuery->first();
            if ($code->visa_description != '') {
                return $code->visa_description;
            } elseif ($code->master_description != '') {
                return $code->master_description;
            } elseif ($code->general_description != '') {
                return $code->general_description;
            } else {
                return '';
            }
        }

        return '';
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

    public function dokuNotify(Request $request)
    {
        Log::warning('NOTIFYING');
        // check IP first
        $this->checkDokuIP($request);

        // get the parameters
        $words = ( $request->has('WORDS') ? $request->get('WORDS') : '' );
        $amount = ( $request->has('AMOUNT') ? $request->get('AMOUNT') : '' );
        $orderId = ( $request->has('TRANSIDMERCHANT') ? $request->get('TRANSIDMERCHANT') : '' );
        $resultMessage = ( $request->has('RESULTMSG') ? $request->get('RESULTMSG') : '' );
        $verifyStatus = ( $request->has('VERIFYSTATUS') ? $request->get('VERIFYSTATUS') : '' );

        $wordsGenerated = sha1($amount . $this->mallId . $this->sharedKey . $orderId . $resultMessage . $verifyStatus);

        if ($words == $wordsGenerated) {
            $responseCode = ( $request->has('RESPONSECODE') ? $request->get('RESPONSECODE') : '' );
            $approvalCode = ( $request->has('APPROVALCODE') ? $request->get('APPROVALCODE') : '' );
            $paymentChannel = ( $request->has('PAYMENTCHANNEL') ? $request->get('PAYMENTCHANNEL') : '' );
            $paymentCode = ( $request->has('PAYMENTCODE') ? $request->get('PAYMENTCODE') : '' );
            $sessionId = ( $request->has('SESSIONID') ? $request->get('SESSIONID') : '' );
            $mcn = ( $request->has('MCN') ? $request->get('MCN') : '' );
            $paymentDateTime = ( $request->has('PAYMENTDATETIME') ? $request->get('PAYMENTDATETIME') : '' );
            $verifyId = ( $request->has('VERIFYID') ? $request->get('VERIFYID') : '' );
            $verifyScore = ( $request->has('VERIFYSCORE') ? $request->get('VERIFYSCORE') : '' );
            $statusType = ( $request->has('STATUSTYPE') ? $request->get('STATUSTYPE') : '' );

            if ($orderId != '' && $sessionId != '' && $amount != '') {
                if ($resultMessage == 'SUCCESS') {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }

        return false;
    }

    public function dokuIdentify(Request $request)
    {
        // check doku ip
        $this->checkDokuIP($request);

        // get parameters
        $amount = ( $request->has('AMOUNT') ? $request->get('AMOUNT') : '' );
        $orderId = ( $request->has('TRANSIDMERCHANT') ? $request->get('TRANSIDMERCHANT') : '' );
        $paymentChannel = ( $request->has('PAYMENTCHANNEL') ? $request->get('PAYMENTCHANNEL') : '' );
        $sessionId = ( $request->has('SESSIONID') ? $request->get('SESSIONID') : '' );

        // set session maybe ?
        Log::warning('IDENTIFYING');
    }

    private function checkDokuIP(Request $request)
    {
        $ipAddress = $request->ip();
        Log::warning("IP Address : " . $ipAddress);
    }

    public function checkPayment($orderId)
    {
        $order = $this->orderService->getOrderById($orderId);
        $client = new Client();

    }
}