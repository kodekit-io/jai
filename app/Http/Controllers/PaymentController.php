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
        if ($result = $this->paymentService->checkDokuResult($request->all())) {
            return view('frontend.thank-you', $result);
        } else {
            return redirect('book-detail/' . $result['orderId']);
        }
    }

    public function dokuNotify(Request $request)
    {
        Log::warning("doku notify is called");
        Log::warning('requests => ' . implode(',', $request->all()));
    }

    public function dokuReview(Request $request)
    {
        var_dump($request->all());
    }

}
