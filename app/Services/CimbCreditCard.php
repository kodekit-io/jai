<?php

namespace App\Service;


use App\Models\CimbCreditCheckout;

class CimbCreditCard extends Payment
{

    protected $merchantAccNo;
    protected $txnPassword;
    protected $returnUrl;
    /**
     * @var CimbCreditCheckout
     */
    private $cimbCheckout;

    /**
     * CimbCreditCard constructor.
     */
    public function __construct(Order $orderService, CimbCreditCheckout $cimbCheckout)
    {
        parent::__construct($orderService);
        $this->merchantAccNo = config('payments.cimb_cc.merchant_acc_no');
        $this->txnPassword = config('payments.cimb_cc.txn_password');
        $this->returnUrl = config('payments.cimb_cc.return_url');
        $this->cimbCheckout = $cimbCheckout;
    }

    public function getCimbCreditCardParameters($orderId)
    {
        $order = $this->orderService->getOrderById($orderId);
//        $amount = $order->total_amount;
        $amount = 1000;
        $grandTotal = number_format($amount, 2, '.', '');

        $word = $this->txnPassword . $this->merchantAccNo . $orderId . $grandTotal;
        $signature = $this->generateTxnSignature($word);

        $params = [
            'MERCHANT_ACC_NO' => $this->merchantAccNo,
            'MERCHANT_TRANID' => $orderId,
            'TXN_PASSWORD' => $this->txnPassword,
            'AMOUNT' => $grandTotal,
            'TRANSACTION_TYPE' => 2,
            'TXN_SIGNATURE' => $signature,
            'RESPONSE_TYPE' => 'HTTP',
            'RETURN_URL' => secure_url($this->returnUrl),
            'TXN_DESC' => 'Jakarta Aquarium Ticket'
        ];

        return $params;
    }

    public function redirectResult($request)
    {
//        var_dump($request->all());
        // check the mandatory fields
        if ($request->has('TXN_STATUS') && $request->has('TXN_SIGNATURE') && $request->has('SECURE_SIGNATURE') && $request->has('RESPONSE_CODE') && $request->has('MERCHANT_TRANID')) {
            $trx['transaction_id'] = $request->get('TRANSACTION_ID');
            $trx['txn_status'] = $request->get('TXN_STATUS');
            $trx['auth_id'] = $request->get('AUTH_ID');
            $trx['tran_date'] = $request->get('TRAN_DATE');
            $trx['sales_date'] = $request->get('SALES_DATE');
            $trx['response_code'] = $request->get('RESPONSE_CODE');
            $trx['response_desc'] = $request->has('RESPONSE_DESC') ? $request->get('RESPONSE_DESC') : '';
            $trx['merchant_tranid'] = $request->get('MERCHANT_TRANID');
            $trx['customer_id'] = $request->has('CUSTOMER_ID') ? $request->get('CUSTOMER_ID') : '';
            $trx['fr_level'] = $request->has('FR_LEVEL') ? $request->get('FR_LEVEL') : '';
            $trx['fr_score'] = $request->has('FR_SCORE') ? $request->get('FR_SCORE') : '';
            $secureSignatureWord = $this->secureSignatureWord($trx);
            $secureSignature = $this->generateSecureSignature($secureSignatureWord);
            $trx['txn_signature'] = $request->get('TXN_SIGNATURE');
            $trx['secure_signature'] = $request->get('SECURE_SIGNATURE');
            if ($secureSignature == $trx['secure_signature']) {
                if ($trx['response_code'] == '0' && $trx['txn_status'] == 'S') {
                    $trx['orderStatus'] = self::COMPLETED;
                    $trx['message'] = 'Transaction completed';
                } else {
                    $trx['message'] = 'Transaction is Failed';
                    $trx['errorMessage'] = $trx['response_desc'];
                    $trx['orderStatus'] = self::CANCELLED;
                }
            } else {
                $trx['message'] = 'Invalid signature. Transaction is Failed';
                $trx['errorMessage'] = 'Invalid signature. Transaction is Failed';
                $trx['orderStatus'] = self::CANCELLED;
            }
        } else {
            $trx['orderStatus'] = self::CANCELLED;
            $trx['message'] = 'Unknown error';
            $trx['errorMessage'] = 'Unknown error';
        }
        $trx['process_type'] = 'REDIRECT';
        $trx['order_id'] = $request->get('MERCHANT_TRANID');
        $this->updateOrderStatus($trx['order_id'], $trx['orderStatus']);
        $this->saveCimbCreditCardCheckout($trx);

        return $trx;
    }

    private function secureSignatureWord($trx)
    {
        /**
         * take out transaction_id, tran_date and txn_status,
         * there is a problem with _ vs alphabetical sort
         * transaction_id is bigger than tran_date
         */
        $sortedArray = [];
        foreach ($trx as $key => $value) {
            if (! in_array($key, ['transaction_id', 'tran_date', 'txn_status'])) {
                $sortedArray[$key] = $value;
            }
        }
        // sort by key
        ksort($sortedArray);
        // add txn_password in the first position
        $word = $this->txnPassword;
        // generate the word
        foreach ($sortedArray as $key => $value) {
            $word .= $value;
        }
        // add additional word
        $word = $word . $trx['transaction_id'] . $trx['tran_date'] . $trx['txn_status'];
        return $word;
    }

    private function generateTxnSignature($word)
    {
        return md5($word);
    }

    private function generateSecureSignature($secureSignatureWord)
    {
        return hash('sha512', $secureSignatureWord);
    }

    private function saveCimbCreditCardCheckout($trx)
    {
        $params = array_except($trx, ['errorMessage', 'orderStatus']);
        $this->cimbCheckout->create($params);
    }

}