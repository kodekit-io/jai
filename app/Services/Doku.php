<?php

namespace App\Service;


use App\Models\DokuCheckout;
use App\Models\DokuResponseCode;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

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

    const CANCELLED = 'cancelled';
    const PENDING = 'pending';
    const COMPLETED = 'completed';
    const HOLD = 'on-hold';

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

        $trx['ipAddress'] = request()->ip();
        $trx['processType'] = 'REQUEST';
        $trx['orderId'] = $transId;
        $trx['amount'] = $amount;
        $trx['sessionId'] = $sessionId;
        $trx['words'] = $words;
        $trx['message'] = "Transaction request start";

        $this->saveDokuCheckout($trx);

        return $params;
    }

    private function generateDokuBasket($order)
    {
        $basket = '';
        $details = $order->details;
        foreach ($details as $detail) {
            if ($detail->qty > 0) {
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
        // $taxAmount = $order->tax;
        // $taxAmount = number_format($taxAmount, 2, '.', '');
        // $tax = 'Service + 10% PB1 Tax,' . $taxAmount . ',1,' . $taxAmount;
        // $basket .= ($basket == '' ? $tax : ';' . $tax);

        return $basket;
    }

    public function dokuNotify(Request $request)
    {
        Log::warning('NOTIFYING');
        // check IP first
        if ($this->checkDokuIP($request)) {
            // get the parameters
            $trx['words'] = ( $request->has('WORDS') ? $request->get('WORDS') : '' );
            $trx['amount'] = ( $request->has('AMOUNT') ? $request->get('AMOUNT') : '' );
            $trx['orderId'] = ( $request->has('TRANSIDMERCHANT') ? $request->get('TRANSIDMERCHANT') : '' );
            $trx['resultMessage'] = ( $request->has('RESULTMSG') ? $request->get('RESULTMSG') : '' );
            $trx['verifyStatus'] = ( $request->has('VERIFYSTATUS') ? $request->get('VERIFYSTATUS') : '' );

            $wordsGenerated = sha1($trx['amount'] . $this->mallId . $this->sharedKey . $trx['orderId'] . $trx['resultMessage'] . $trx['verifyStatus']);

            if ($trx['words'] == $wordsGenerated) {
                $trx['responseCode'] = ( $request->has('RESPONSECODE') ? $request->get('RESPONSECODE') : '' );
                $trx['approvalCode'] = ( $request->has('APPROVALCODE') ? $request->get('APPROVALCODE') : '' );
                $trx['paymentChannel'] = ( $request->has('PAYMENTCHANNEL') ? $request->get('PAYMENTCHANNEL') : '' );
                $trx['paymentCode'] = ( $request->has('PAYMENTCODE') ? $request->get('PAYMENTCODE') : '' );
                $trx['sessionId'] = ( $request->has('SESSIONID') ? $request->get('SESSIONID') : '' );
                $trx['bank'] = ( $request->has('BANK') ? $request->get('BANK') : '' );
                $trx['creditCard'] = ( $request->has('MCN') ? $request->get('MCN') : '' );
                $trx['paymentDateTime'] = ( $request->has('PAYMENTDATETIME') ? $request->get('PAYMENTDATETIME') : '' );
                $trx['verifyId'] = ( $request->has('VERIFYID') ? $request->get('VERIFYID') : '' );
                $trx['verifyScore'] = ( $request->has('VERIFYSCORE') ? $request->get('VERIFYSCORE') : '' );
                $trx['notifyType'] = ( $request->has('STATUSTYPE') ? $request->get('STATUSTYPE') : '' );

                if ($this->checkTransaction($trx) > 0) {
                    if ( $trx['resultMessage'] == "SUCCESS"
                        && $trx['notifyType'] == "P"
                        && in_array($trx['paymentChannel'], $this->getAtmPaymentChannel()) ) {
                        $trx['message'] = "Notify process message come from DOKU. Success : completed";
                        $status = self::COMPLETED;
                    } if ( $trx['resultMessage'] == "SUCCESS"
                        && $trx['notifyType'] == "P" ) {
                        $trx['message'] = "Notify process message come from DOKU. Success : completed";
                        $status = self::COMPLETED;
                    } elseif ($trx['resultMessage'] == "FAILED"
                        && $trx['notify_type']=="P") {
                        $trx['message'] = "Notify process message come from DOKU. Transaction failed : canceled";
                        $status = self::CANCELLED;
                    } elseif ( $trx['notify_type']=="V" ) {
                        $trx['message'] = "Notify process message come from DOKU. Void by EDU : canceled";
                        $status = self::CANCELLED;
                    } else {
                        $trx['message'] = "Notify process message come from DOKU, use default rule : canceled";
                        $status = self::CANCELLED;
                    }
                    $trx['processType'] = 'NOTIFY';
                    $this->saveDokuCheckout($trx);
                    // update status, send email, etc
                    $this->updateOrderStatus($trx['orderId'], $status);
                    return 'Continue';
                } else {
                    return 'Stop : Invalid Request';
                }
            } else {
                return 'Stop : Wrong signature';
            }
        } else {
            return "Stop : IP Not Allowed";
        }
    }

    public function dokuRedirect(Request $request)
    {
//        var_dump($request->all()); exit();
        $trx['words'] = ( $request->has('WORDS') ? $request->get('WORDS') : '' );
        $trx['amount'] = ( $request->has('AMOUNT') ? $request->get('AMOUNT') : '' );
        $trx['orderId'] = ( $request->has('TRANSIDMERCHANT') ? $request->get('TRANSIDMERCHANT') : '' );
        $trx['statusCode'] = ( $request->has('STATUSCODE') ? $request->get('STATUSCODE') : '' );
        $trx['processType'] = 'REDIRECT';
        $wordsGenerated = sha1($trx['amount'] . $this->sharedKey . $trx['orderId'] . $trx['statusCode']);
        if ( $trx['words'] == $wordsGenerated ) {
            $trx['paymentChannel'] = ( $request->has('PAYMENTCHANNEL') ? $request->get('PAYMENTCHANNEL') : '' );
            $trx['paymentCode'] = ( $request->has('PAYMENTCODE') ? $request->get('PAYMENTCODE') : '' );
            $trx['sessionId'] = ( $request->has('SESSIONID') ? $request->get('SESSIONID') : '' );
            $trx['ipAddress'] = $request->ip();
            // skip notify if using atm / alfa / va
            if ( in_array($trx['paymentChannel'], $this->getAtmPaymentChannel()) && $trx['statusCode'] == "5511" ) {
                $trx['message'] = "Redirect process come from DOKU. Transaction is pending for payment";
                $trx['status'] = self::HOLD;
                // atm transfer succeed
                // action here
            } else {
                // check for notify
                switch ($trx['statusCode'])
                {
                    case "0000":
                        $resultMsg = "SUCCESS";
                        break;
                    default:
                        $resultMsg = "FAILED";
                        break;
                }

                $result = $this->checkTransaction($trx, 'NOTIFY', $resultMsg);

                if ( $result < 1 ) {
                    $checkStatusResult = $this->checkStatus($trx);

                    if ( $checkStatusResult == 'SUCCESS' ) {
                        $trx['message'] = "Redirect process with no notify message come from DOKU. Transaction is Success. Please check on Back Office.";
                        $trx['status'] = self::COMPLETED;
                    } else {
                        if ( $trx['statusCode'] == "0000" && $checkStatusResult == "NOT SUPPORT" ) {
                            $trx['message'] = "Redirect process with no notify message come from DOKU. Transaction got Success Status Code. Please check on Back Office.";
                            $trx['status'] = self::PENDING;
                        } else {
                            $trx['message'] = "Redirect process with no notify message come from DOKU. Transaction is Failed. Please check on Back Office.";
                            $trx['status'] = self::CANCELLED;
                            $trx['errorMessage'] = $this->getDokuResponse($trx['statusCode']);
                        }
                    }
                } else {
                    if ( $trx['statusCode'] == "0000" ) {
                        $trx['message'] = "Redirect process message come from DOKU with succeed notify. Transaction is Success";
                        $trx['status'] = self::COMPLETED;
                    } else {
                        $trx['message'] = "Redirect process message come from DOKU with failed notify. Transaction is Failed";
                        $trx['status'] = self::CANCELLED;
                        $trx['errorMessage'] = $this->getDokuResponse($trx['statusCode']);
                    }
                }
            }
        } else {
            // invalid request
            $trx['message'] = 'Invalid signature. Transaction is Failed';
            $trx['errorMessage'] = 'Invalid signature. Transaction is Failed';
            $trx['status'] = self::CANCELLED;
        }

        $this->updateOrderStatus($trx['orderId'], $trx['status']);
        $this->saveDokuCheckout($trx);

        return $trx;

    }

    public function checkDokuResult(Request $request)
    {
//        var_dump($request->all()); exit();
        $trx['words'] = ( $request->has('WORDS') ? $request->get('WORDS') : '' );
        $trx['amount'] = ( $request->has('AMOUNT') ? $request->get('AMOUNT') : '' );
        $trx['orderId'] = ( $request->has('TRANSIDMERCHANT') ? $request->get('TRANSIDMERCHANT') : '' );
        $trx['statusCode'] = ( $request->has('STATUSCODE') ? $request->get('STATUSCODE') : '' );
        $wordsGenerated = sha1($trx['amount'] . $this->sharedKey . $trx['orderId'] . $trx['statusCode']);
        if ($trx['words'] == $wordsGenerated) {
            $trx['paymentChannel'] = ( $request->has('PAYMENTCHANNEL') ? $request->get('PAYMENTCHANNEL') : '' );
            $trx['sessionId'] = ( $request->has('SESSIONID') ? $request->get('SESSIONID') : '' );
            if ($trx['amount'] != '' && $trx['orderId'] != '' && $trx['sessionId'] != '') {
                // check for atm transfer
                if (in_array($trx['paymentChannel'], $this->getAtmPaymentChannel())) {
                    if ($trx['statusCode'] = '0000') {
                        // succeed
                        $arr = [
                            'paymentType' => 'bankTransfer',
                            'orderId' => $trx['orderId'],
                            'paymentCode' => $request['PAYMENTCODE'],
                            'message' => 'SUCCEED'
                        ];
                        return $arr;
                    } else {
                        // transaction failed
                        $arr = [
                            'paymentType' => 'bankTransfer',
                            'orderId' => $trx['orderId'],
                            'paymentCode' => $request['PAYMENTCODE'],
                            'message' => $this->getDokuResponse($trx['statusCode'])
                        ];
                    }
//                    $this->saveDokuCheckout($trx);
                } else {
                    if ($trx['statusCode'] == '0000') {
                        // succeed
                        $arr = [
                            'paymentType' => 'creditCard',
                            'orderId' => $trx['orderId'],
                            'paymentCode' => $request['PAYMENTCODE'],
                            'message' => 'SUCCEED'
                        ];
                        return $arr;
                    } else {
                        // transaction failed
                        $arr = [
                            'paymentType' => 'creditCard',
                            'orderId' => $trx['orderId'],
                            'paymentCode' => $request['PAYMENTCODE'],
                            'message' => $this->getDokuResponse($trx['statusCode'])
                        ];
                    }
//                    $this->saveDokuCheckout($trx);
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

    public function dokuIdentify(Request $request)
    {
        // check doku ip
        if ($this->checkDokuIP($request)) {
            // get parameters
            $amount = ( $request->has('AMOUNT') ? $request->get('AMOUNT') : '' );
            $orderId = ( $request->has('TRANSIDMERCHANT') ? $request->get('TRANSIDMERCHANT') : '' );
            $paymentChannel = ( $request->has('PAYMENTCHANNEL') ? $request->get('PAYMENTCHANNEL') : '' );
            $sessionId = ( $request->has('SESSIONID') ? $request->get('SESSIONID') : '' );

            // set session maybe ?
            Log::warning('IDENTIFYING');
        }
    }

    private function checkDokuIP(Request $request)
    {
        $ipAddress = $request->ip();
        $ipRange = '103.10.129.';
        Log::warning($ipAddress);
        return ( substr($ipAddress,0,strlen($ipRange)) == $ipRange );
    }

    private function saveDokuCheckout(array $datas)
    {
        $data['ip_address'] = ( isset($datas['ipAddress']) ? $datas['ipAddress'] : '' );
        $data['process_type'] = ( isset($datas['processType']) ? $datas['processType'] : '' );
        $data['order_id'] = ( isset($datas['orderId']) ? $datas['orderId'] : '' );
        $data['amount'] = ( isset($datas['amount']) ? $datas['amount'] : '' );
        $data['response_code'] = ( isset($datas['responseCode']) ? $datas['responseCode'] : '' );
        $data['status_code'] = ( isset($datas['statusCode']) ? $datas['statusCode'] : '' );
        $data['result_msg'] = ( isset($datas['resultMsg']) ? $datas['resultMsg'] : '' );
        $data['payment_channel'] = ( isset($datas['paymentChannel']) ? $datas['paymentChannel'] : '' );
        $data['payment_datetime'] = ( isset($datas['paymentDateTime']) ? $datas['paymentDateTime'] : NULL );
        $data['payment_code'] = ( isset($datas['paymentCode']) ? $datas['paymentCode'] : '' );
        $data['words'] = ( isset($datas['words']) ? $datas['words'] : '' );
        $data['session_id'] = ( isset($datas['sessionId']) ? $datas['sessionId'] : '' );
        $data['bank'] = ( isset($datas['bank']) ? $datas['bank'] : '' );
        $data['credit_card'] = ( isset($datas['creditCard']) ? $datas['creditCard'] : '' );
        $data['message'] = ( isset($datas['message']) ? $datas['message'] : '' );

        DokuCheckout::create($data);
    }

    private function checkTransaction($trx, $process = 'REQUEST', $resultMsg = '')
    {
        if ( $resultMsg == "PENDING" ) return 0;

        $orderId = $trx['orderId'];
        $sessionId = $trx['sessionId'];
        $amount = $trx['amount'];

        $query = DokuCheckout::where('order_id', $orderId)
            ->where('session_id', $sessionId)
            ->where('amount', $amount)
            ->where('process_type', $process);

        if ($resultMsg != '') {
            $query = $query->where('result_msg', $resultMsg);
        }

        return $query->count();
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

    private function getAtmPaymentChannel()
    {
        return ['5', '05', '14', '21', '22'];
    }

    private function checkStatus($trx)
    {
        $checkStatusUrl = config('payments.doku.url_check_status');
        $mallId = $this->mallId;
        $sharedKey = $this->sharedKey;
        $chainMerchant = 'NA';
        $transIdMerchant = $trx['orderId'];
        $sessionId = $trx['sessionId'];
        $words = sha1($mallId.$sharedKey.$transIdMerchant);

        $data = "MALLID=".$mallId."&CHAINMERCHANT=".$chainMerchant."&TRANSIDMERCHANT=".$transIdMerchant."&SESSIONID=".$sessionId."&PAYMENTCHANNEL=&WORDS=".$words;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $checkStatusUrl);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 20);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        $output = curl_exec($ch);
        $curl_errno = curl_errno($ch);
        $curl_error = curl_error($ch);
        curl_close($ch);

        if ($curl_errno > 0)
        {
            #return "Stop : Connection Error";
        }

        libxml_use_internal_errors(true);
        $xml = simplexml_load_string($output);

        if ( $xml )
        {
//             var_dump($xml); exit();
            $trx['ipAddress'] = request()->ip();
            $trx['processType'] = "CHECKSTATUS";
            $trx['orderId'] = (string) $xml->TRANSIDMERCHANT;
            $trx['amount'] = (string) $xml->AMOUNT;
            $trx['notifyType'] = (string) $xml->STATUSTYPE;
            $trx['responseCode'] = (string) $xml->RESPONSECODE;
            $trx['resultMsg'] = (string) $xml->RESULTMSG;
            $trx['approvalCode'] = (string) $xml->APPROVALCODE;
            $trx['paymentChannel'] = (string) $xml->PAYMENTCHANNEL;
            $trx['paymentCode'] = (string) $xml->PAYMENTCODE;
            $trx['words'] = (string) $xml->WORDS;
            $trx['sessionId'] = (string) $xml->SESSIONID;
            $trx['bank'] = (string) $xml->BANK;
            $trx['creditCard'] = (string) $xml->MCN;
            $trx['verifyId'] = (string) $xml->VERIFYID;
            $trx['verifyScore'] = (int) $xml->VERIFYSCORE;
            $trx['verifyStatus'] = (string) $xml->VERIFYSTATUS;
            $trx['message'] = 'Checking payment status from doku.';

            # Insert transaction check status to table onecheckout
            $this->saveDokuCheckout($trx);

            if (! in_array($trx['paymentChannel'], ['01','15'])  )
            {
                return "NOT SUPPORT";
            }

            return (string) $xml->RESULTMSG;
        } else {
            return 'Failed';
        }
    }

    private function updateOrderStatus($orderId, $status)
    {
        $this->orderService->updateStatus($orderId, $status);
    }
}