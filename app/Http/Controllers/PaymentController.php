<?php

namespace App\Http\Controllers;

use App\Service\Order;
use App\Service\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{

    /**
     * @var Payment
     */
    private $paymentService;
    /**
     * @var Order
     */
    private $orderService;

    /**
     * PaymentController constructor.
     * @param Payment $paymentService
     * @param Order $orderService
     */
    public function __construct(Payment $paymentService, Order $orderService)
    {
        $this->paymentService = $paymentService;
        $this->orderService = $orderService;
    }

    /**
     * @param Request $request
     */
    public function dokuResult(Request $request)
    {
//        var_dump($request->all()); exit();
        if ($result = $this->paymentService->checkDokuResult($request->all())) {
            return view('frontend.thank-you', $result);
        } else {
            return redirect('book-detail/' . $result['orderId']);
        }
    }

    public function dokuNotify(Request $request)
    {
        $allRequest = $request->all();
        $totalAmount = $allRequest['AMOUNT'];
        $orderId = $allRequest['TRANSIDMERCHANT'];
        $order = $this->orderService->getOrderById($orderId);
        $responseCode = $allRequest['RESPONSECODE'];
        if ($responseCode == '0000' && ($order->total_amount == $totalAmount)) {
            return 'CONTINUE';
        }
    }

    public function dokuReview(Request $request)
    {
        var_dump($request->all());
    }

}
