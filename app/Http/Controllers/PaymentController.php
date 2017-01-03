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
        $result = $this->dokuService->dokuRedirect($request);
        if ($result['status'] == 'completed' || $result['status'] == 'on-hold') {
            return view('frontend.thank-you', $result);
        } else {
            return view('frontend.transaction-failed', $result);
        }
    }

    public function dokuNotify(Request $request)
    {
        return $this->dokuService->dokuNotify($request);
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

}
