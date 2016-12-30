<?php

namespace App\Service;

use Log;

class Cimb
{
    protected $redirectUrl;
    protected $backendUrl;
    protected $merchantCode;
    protected $merchantKey;
    /**
     * @var Order
     */
    private $orderService;

    /**
     * Cimb constructor.
     * @param Order $orderService
     */
    public function __construct(Order $orderService)
    {
        $this->orderService = $orderService;
        $this->merchantCode = config('payments.cimb.merchant_code');
        $this->merchantKey = config('payments.cimb.merchant_key');
        $this->redirectUrl = config('payments.cimb.redirect_url');
        $this->backendUrl = config('payments.cimb.backend_url');
    }

    /**
     * @param $orderId
     * @return array
     */
    public function getCimbParameters($orderId)
    {
        $order = $this->orderService->getOrderById($orderId);
        $grandTotal = $order->total_amount;
        $signatureWord = $this->merchantKey . $this->merchantCode . $orderId . $grandTotal . 'IDR';
        Log::warning('words ==> ' . $signatureWord);
        $signature = base64_encode(sha1($signatureWord, true));
        Log::warning('signature ==> ' . $signature);
        $params = [
            'MerchantCode' => $this->merchantCode,
            'RefNo' => $orderId,
            'Amount' => $grandTotal,
            'Currency' => 'IDR',
            'ProdDesc' => 'Jakarta Aquarium Ticket',
            'UserName' => $order->name,
            'UserEmail' => $order->email,
            'UserContact' => $order->phone_number,
            'Signature' => $signature,
            'ResponseURL' => url($this->redirectUrl),
            'BackendURL' => url($this->backendUrl)
        ];

        return $params;
    }
}