<?php

namespace App\Service;



class Payment
{
    const OPEN = 'open';
    const HOLD = 'on-hold';
    const PENDING = 'pending';
    const CANCELLED = 'cancelled';
    const COMPLETED = 'completed';


    /**
     * @var Order
     */
    protected $orderService;

    /**
     * Payment constructor.
     * @param Order $orderService
     */
    public function __construct(Order $orderService)
    {
        $this->orderService = $orderService;
    }

    protected function updateOrderStatus($orderId, $status, $paymentType = '')
    {
        $this->orderService->updateStatus($orderId, $status, $paymentType);
    }
}