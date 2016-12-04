<?php

namespace App\Http\Controllers;

use App\Service\Order;
use App\Service\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{

    /**
     * @var Payment
     */
    private $paymentService;

    /**
     * PaymentController constructor.
     * @param Payment $paymentService
     */
    public function __construct(Payment $paymentService)
    {
        $this->paymentService = $paymentService;
    }

    /**
     * @param Request $request
     */
    public function dokuResult(Request $request)
    {
        var_dump($request); exit;
        if ($this->paymentService->checkDokuResult($request->all())) {
            echo 'BERHASIL';
        } else {
            echo 'FAILED';
        }
    }

    public function dokuNotify(Request $request)
    {
        var_dump($request->all());
    }

    public function dokuReview(Request $request)
    {
        var_dump($request->all());
    }

}
