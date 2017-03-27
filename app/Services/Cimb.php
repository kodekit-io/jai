<?php

namespace App\Service;

use App\Models\CimbCheckout;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Log;

class Cimb extends Payment
{
    protected $redirectUrl;
    protected $requeryUrl;
    protected $merchantCode;
    protected $merchantKey;
    protected $backendUrl;

    /**
     * Cimb constructor.
     * @param Order $orderService
     */
    public function __construct(Order $orderService)
    {
        parent::__construct($orderService);
        $this->merchantCode = config('payments.cimb.merchant_code');
        $this->merchantKey = config('payments.cimb.merchant_key');
        $this->redirectUrl = config('payments.cimb.redirect_url');
        $this->requeryUrl = config('payments.cimb.requery_url');
        $this->backendUrl = config('payments.cimb.backend_url');
    }

    /**
     * @param $orderId
     * @return array
     */
    public function getCimbParameters($orderId)
    {
        $order = $this->orderService->getOrderById($orderId);
        $trx['amount'] = $order->total_amount.'00';
        $trx['currency'] = 'IDR';
        $trx['orderId'] = $orderId;
        $signatureWord = $this->merchantKey . $this->merchantCode . $trx['orderId'] . $trx['amount'] . $trx['currency'];
        $trx['signature'] = base64_encode(sha1($signatureWord, true));
        $params = [
            'MerchantCode' => $this->merchantCode,
            'RefNo' => $trx['orderId'],
            'Amount' => $trx['amount'],
            'Currency' => $trx['currency'],
            'ProdDesc' => 'Jakarta Aquarium Ticket',
            'UserName' => $order->name,
            'UserEmail' => $order->email,
            'UserContact' => $order->phone_number,
            'Signature' => $trx['signature'],
            'ResponseURL' => url($this->redirectUrl),
            'BackendURL' => url($this->backendUrl)
        ];
        $trx['process_type'] = 'REQUEST';
        $trx['message'] = 'Transaction request start';

        // $this->saveCimbCheckout($trx);

        return $params;
    }

    public function redirectResult(Request $request)
    {
        $trx['paymentId'] = ( $request->has('PaymentId') ? $request->input('PaymentId') : '' );
        $trx['orderId'] = ( $request->has('RefNo') ? $request->input('RefNo') : '' );
        $trx['amount'] = ( $request->has('Amount') ? $request->input('Amount') : '0' );
        $trx['currency'] = ( $request->has('Currency') ? $request->input('Currency') : '' );
        $trx['remark'] = ( $request->has('Remark') ? $request->input('Remark') : '' );
        $trx['transId'] = ( $request->has('TransId') ? $request->input('TransId') : '' );
        $trx['authCode'] = ( $request->has('AuthCode') ? $request->input('AuthCode') : '' );
        $trx['status'] = ( $request->has('Status') ? $request->input('Status') : '' );
        $trx['errDesc'] = ( $request->has('ErrDesc') ? $request->input('ErrDesc') : '' );
        $trx['signature'] = ( $request->has('Signature') ? $request->input('Signature') : '' );
        $trx['processType'] = 'REDIRECT';

        Log::warning(\GuzzleHttp\json_encode($request->all()));;
        Log::warning('merchant key ==> ' . $this->merchantKey);
        Log::warning('merchant code ==> ' . $this->merchantCode);
        Log::warning('payment id ==> ' . $trx['paymentId']);
        Log::warning('ref no ==> ' . $trx['orderId']);
        Log::warning('amount ==> ' . $trx['amount']);
        Log::warning('currency ==> ' . $trx['currency']);
        Log::warning('status ==> ' . $trx['status']);

        $signatureWord = $this->merchantKey . $this->merchantCode . $trx['paymentId'] . $trx['orderId'] . $trx['amount'] . $trx['currency'] . $trx['status'];
        $generatedSignature = base64_encode(sha1($signatureWord, true));

        if ($generatedSignature == $trx['signature']) {
            if ($trx['status'] == '1') {
                // check the status for security purpose
                $status = $this->checkStatus($trx);
                if ($status == '00') {
                    $trx['message'] = 'Transaction is succeed, check status succeed';
                    $trx['errorMessage'] = '';
                    $trx['orderStatus'] = self::COMPLETED;
                } else {
                    $trx['message'] = 'Transaction is succeed, check status is failed';
                    $trx['errorMessage'] = 'Check status is failed';
                    $trx['orderStatus'] = self::CANCELLED;
                }

            } else {
                $trx['message'] = 'Payment is failed : ' . $trx['errDesc'];
                $trx['errorMessage'] = $trx['errDesc'];
                $trx['orderStatus'] = self::CANCELLED;
            }
        } else {
            $trx['message'] = 'Invalid signature. Transaction is Failed';
            $trx['errorMessage'] = 'Invalid signature. Transaction is Failed';
            $trx['orderStatus'] = self::CANCELLED;
        }

        $this->updateOrderStatus($trx['orderId'], $trx['orderStatus'], 'CIMB CLICK');
        $this->saveCimbCheckout($trx);

        return $trx;
    }

    public function cimbBackend(Request $request)
    {
        $trx['paymentId'] = ( $request->has('PaymentId') ? $request->input('PaymentId') : '' );
        $trx['orderId'] = ( $request->has('RefNo') ? $request->input('RefNo') : '' );
        $trx['amount'] = ( $request->has('Amount') ? $request->input('Amount') : '0' );
        $trx['currency'] = ( $request->has('Currency') ? $request->input('Currency') : '' );
        $trx['remark'] = ( $request->has('Remark') ? $request->input('Remark') : '' );
        $trx['transId'] = ( $request->has('TransId') ? $request->input('TransId') : '' );
        $trx['authCode'] = ( $request->has('AuthCode') ? $request->input('AuthCode') : '' );
        $trx['status'] = ( $request->has('Status') ? $request->input('Status') : '' );
        $trx['errDesc'] = ( $request->has('ErrDesc') ? $request->input('ErrDesc') : '' );
        $trx['signature'] = ( $request->has('Signature') ? $request->input('Signature') : '' );
        $trx['processType'] = 'BACKEND';

        $signatureWord = $this->merchantKey . $this->merchantCode . $trx['paymentId'] . $trx['orderId'] . $trx['amount'] . $trx['currency'] . $trx['status'];
        $generatedSignature = base64_encode(sha1($signatureWord, true));

        $orderStatus = $this->orderService->getOrderById($trx['orderId']);
        if ($orderStatus != 'completed') {
            if ($generatedSignature == $trx['signature']) {
                if ($trx['status'] == '1') {
                    // check the status for security purpose
                    $status = $this->checkStatus($trx);
                    if ($status == '00') {
                        $trx['message'] = 'Transaction is succeed, check status succeed';
                        $trx['errorMessage'] = '';
                        $trx['orderStatus'] = self::COMPLETED;
                    } else {
                        $trx['message'] = 'Transaction is succeed, check status is failed';
                        $trx['errorMessage'] = 'Check status is failed';
                        $trx['orderStatus'] = self::CANCELLED;
                    }
                } else {
                    $trx['message'] = 'Payment is failed : ' . $trx['errDesc'];
                    $trx['errorMessage'] = $trx['errDesc'];
                    $trx['orderStatus'] = self::CANCELLED;
                }
            } else {
                $trx['message'] = 'Invalid signature. Transaction is Failed';
                $trx['errorMessage'] = 'Invalid signature. Transaction is Failed';
                $trx['orderStatus'] = self::CANCELLED;
            }
            $this->updateOrderStatus($trx['orderId'], $trx['orderStatus'], 'CIMB CLICK');
            $this->saveCimbCheckout($trx);
        }

        return 'OK';
    }

    public function checkStatus($trx)
    {
        $client = new Client();
        $params = [
            'MerchantCode' => $this->merchantCode,
            'RefNo' => $trx['orderId'],
            'Amount' => $trx['amount']
        ];

        $response = $client->post($this->requeryUrl, [
            'form_params' => $params
        ]);

        $body = $response->getBody();

        $stringBody = (string) $body;

        return $stringBody;
    }

    private function saveCimbCheckout($trx)
    {
        $data['process_type'] = isset($trx['processType']) ? $trx['processType'] : '';
        $data['payment_id'] = isset($trx['paymentId']) ? $trx['paymentId'] : '';
        $data['order_id'] = isset($trx['orderId']) ? $trx['orderId'] : '';
        $data['amount'] = isset($trx['amount']) ? $trx['amount'] : '';
        $data['currency'] = isset($trx['currency']) ? $trx['currency'] : '';
        $data['remark'] = isset($trx['remark']) ? $trx['remark'] : '';
        $data['trans_id'] = isset($trx['transId']) ? $trx['transId'] : '';
        $data['auth_code'] = isset($trx['authCode']) ? $trx['authCode'] : '';
        $data['status'] = isset($trx['status']) ? $trx['status'] : '';
        $data['error_desc'] = isset($trx['errDesc']) ? $trx['errDesc'] : '';
        $data['signature'] = isset($trx['signature']) ? $trx['signature'] : '';
        $data['message'] = isset($trx['message']) ? $trx['message'] : '';

        CimbCheckout::create($data);
    }

}