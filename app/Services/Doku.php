<?php

namespace App\Service;


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
     * Doku constructor.
     * @param Order $orderService
     */
    public function __construct(Order $orderService)
    {
        $this->orderService = $orderService;
        $this->mallId = config('doku.doku.mall_id');
        $this->sharedKey = config('doku.doku.shared_key');
    }

    public function checkPayment($orderId)
    {
        $order = $this->orderService->getOrderById($orderId);
        $client = new Client();

    }
}