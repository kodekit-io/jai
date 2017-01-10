<?php

namespace App\Http\Controllers;

use App\Service\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * @var Order
     */
    private $orderService;

    protected $baseUrl = 'order';

    /**
     * OrderController constructor.
     * @param Order $orderService
     */
    public function __construct(Order $orderService)
    {
        $this->orderService = $orderService;
    }

    public function index()
    {
        return view('backend.orders.list');
    }

    public function anyData()
    {
        return $this->orderService->datatableData($this->baseUrl);
    }

    public function detail($id)
    {
        $order = $this->orderService->getOrderById($id);
        var_dump($id); exit();
    }
}
