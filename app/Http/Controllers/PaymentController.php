<?php

namespace App\Http\Controllers;

use App\Service\Cimb;
use App\Service\CimbCreditCard;
use App\Service\Doku;
use App\Service\Galasys;
use App\Service\Order;
use App\Service\Payment;
use App\Service\Ticket;
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
     * @var Cimb
     */
    private $cimbService;
    /**
     * @var Galasys
     */
    private $galasysService;
    /**
     * @var Ticket
     */
    private $ticketService;
    /**
     * @var CimbCreditCard
     */
    private $cimbCreditService;


    /**
     * PaymentController constructor.
     * @param Order $orderService
     * @param Doku $dokuService
     * @param Cimb $cimbService
     * @param CimbCreditCard $cimbCreditService
     * @param Ticket $ticketService
     */
    public function __construct(Order $orderService, Doku $dokuService, Cimb $cimbService, CimbCreditCard $cimbCreditService, Ticket $ticketService)
    {
        $this->orderService = $orderService;
        $this->dokuService = $dokuService;
        $this->cimbService = $cimbService;
        $this->ticketService = $ticketService;
        $this->cimbCreditService = $cimbCreditService;

    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function dokuResult(Request $request)
    {
        $result = $this->dokuService->redirectResult($request);
        $result['lang'] = session('lang');
        if ($result['orderStatus'] == 'completed' || $result['orderStatus'] == 'on-hold') {
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
        $result = $this->cimbService->redirectResult($request);
        $result['lang'] = session('lang');
        if ($result['orderStatus'] == 'completed') {
            return view('frontend.thank-you', $result);
        } else {
            return view('frontend.transaction-failed', $result);
        }
    }

    public function cimbBackend(Request $request)
    {
        return $this->cimbService->cimbBackend($request);
    }

    public function cimbStatus()
    {
        $trx['orderId'] = 119;
        $trx['amount'] = 20000000;
        $status = $this->cimbService->checkStatus($trx);
        var_dump($status); exit();
    }

    // CIMB CREDIT CARD
    public function cimbCreditResult(Request $request)
    {
        $result = $this->cimbCreditService->redirectResult($request);
        $result['lang'] = session('lang');
        if ($result['orderStatus'] == 'completed') {
            return view('frontend.thank-you', $result);
        } else {
            return view('frontend.transaction-failed', $result);
        }
    }

    public function dokuCheckStatus()
    {
        $trx['orderId'] = '188';
        $trx['sessionId'] = 'zaw15Zh0yYK8lgs2iomSG7fkVlwT20NzYgg9wlZI';

        $res = $this->dokuService->checkStatus($trx);
        var_dump($res);
    }

}
