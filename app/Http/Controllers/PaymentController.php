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
        $result = $this->paymentService->checkDokuResult($request);
        if ($result['message'] == 'SUCCEED') {
            return view('frontend.thank-you', $result);
        } else {
            return view('frontend.transaction-failed', $result);
        }
    }

    public function dokuNotify(Request $request)
    {
        $notify = $this->paymentService->dokuNotify($request);
        if ($notify) {
            return 'CONTINUE';
        }

        return 'STOP';
    }

    public function dokuIdentify(Request $request)
    {
        $this->paymentService->dokuIdentify($request);
    }

    public function dokuReview(Request $request)
    {
        var_dump($request->all());
    }

    public function dokuWords()
    {
        echo sha1('291500.00' . 'XFHblFdq2316' . '28' . '0000');
    }

}
