<?php

namespace App\Http\Controllers;

use App\Service\Doku;
use App\Service\Order;
use App\Service\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{

    /**
     * @var Order
     */
    private $orderService;
    /**
     * @var Doku
     */
    private $dokuService;

    /**
     * PaymentController constructor.
     * @param Order $orderService
     * @param Doku $dokuService
     * @internal param Payment $paymentService
     */
    public function __construct(Order $orderService, Doku $dokuService)
    {
        $this->orderService = $orderService;
        $this->dokuService = $dokuService;
    }

    /**
     * @param Request $request
     */
    public function dokuResult(Request $request)
    {
//        var_dump($request->all()); exit();
        $result = $this->dokuService->checkDokuResult($request);
        if ($result['message'] == 'SUCCEED') {
            return view('frontend.thank-you', $result);
        } else {
            return view('frontend.transaction-failed', $result);
        }
    }

    public function dokuNotify(Request $request)
    {
        $notify = $this->dokuService->dokuNotify($request);
        if ($notify) {
            return 'CONTINUE';
        }

        return 'STOP';
    }

    public function dokuIdentify(Request $request)
    {
        $this->dokuService->dokuIdentify($request);
    }

    public function dokuReview(Request $request)
    {
        var_dump($request->all());
    }

    public function cimbResult(Request $request)
    {
        var_dump($request->all());
    }

    public function dokuWords()
    {
        echo sha1('291500.00' . 'XFHblFdq2316' . '28' . '0000');
    }

}
