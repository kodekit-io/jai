<?php

namespace App\Http\Controllers;

use App\Service\Cimb;
use App\Service\CimbCreditCard;
use App\Service\CimbRekPonsel;
use App\Service\Doku;
use App\Service\Galasys;
use App\Service\Order;
use App\Service\Payment;
use App\Service\Ticket;
use Carbon\Carbon;
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
     * @var CimbRekPonsel
     */
    private $cimbRekPonsel;


    /**
     * PaymentController constructor.
     * @param Order $orderService
     * @param Doku $dokuService
     * @param Cimb $cimbService
     * @param CimbCreditCard $cimbCreditService
     * @param Ticket $ticketService
     */
    public function __construct(Order $orderService, Doku $dokuService, Cimb $cimbService, CimbRekPonsel $cimbRekPonsel, CimbCreditCard $cimbCreditService, Ticket $ticketService)
    {
        $this->orderService = $orderService;
        $this->dokuService = $dokuService;
        $this->cimbService = $cimbService;
        $this->ticketService = $ticketService;
        $this->cimbCreditService = $cimbCreditService;
        $this->cimbRekPonsel = $cimbRekPonsel;
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

    public function cimbRekPonselResult(Request $request)
    {
        $result = $this->cimbRekPonsel->redirectResult($request);
        $result['lang'] = session('lang');
        if ($result['orderStatus'] == 'completed') {
            return view('frontend.thank-you', $result);
        } else {
            return view('frontend.transaction-failed', $result);
        }
    }

    public function cimbRekPonselBackend(Request $request)
    {
        return $this->cimbRekPonsel->cimbBackend($request);
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
        $trx['orderId'] = '192';
        $trx['sessionId'] = 'L6jVvPsjBnZydQMfk4EZVxLIwWAdJjZDTX75T686';

        $res = $this->dokuService->checkStatus($trx);
        var_dump($res);
    }

    public function checkDokuAtmPayment()
    {
        $expiredInHours = 12;
        $now = Carbon::now();
        $minDateTime = $now->subHours($expiredInHours - 1);
        $holdOrders = $this->orderService->getHoldOrder();

        foreach ($holdOrders as $holdOrder) {
            $transactionDate = Carbon::createFromFormat('Y-m-d H:i:s', $holdOrder->created_at);

            $dokuRequest = $this->dokuService->getDokuCheckoutByOrderIdAndType($holdOrder->id, 'REQUEST');
            if ($dokuRequest) {
                $trx['orderId'] = $holdOrder->id;
                $trx['sessionId'] = $dokuRequest->session_id;
                Log::warning(\GuzzleHttp\json_encode($trx));
                $statusResult = $this->dokuService->checkStatus($trx, 'array');

                if ($statusResult['statusMessage'] == 'SUCCESS') {
                    $trx['processType'] = 'ATM BATCH';
                    $trx['message'] = 'Check Status Success.';
                    $this->dokuService->saveDokuCheckout($trx);
                    $this->orderService->updateStatus($holdOrder->id, 'completed', 'DOKU');
                } elseif ($statusResult['statusMessage'] == 'VOIDED') {
                    $trx['processType'] = 'ATM BATCH';
                    $trx['message'] = 'Transaction Voided.';
                    $this->dokuService->saveDokuCheckout($trx);
                    $this->orderService->updateStatus($holdOrder->id, 'cancelled', 'DOKU');
                } else {
                    if ($transactionDate->lte($minDateTime)) {
                        // cancel
                        $trx['processType'] = 'ATM BATCH';
                        $trx['message'] = 'Payment Expired (Timeout)';
                        $this->dokuService->saveDokuCheckout($trx);
                        $this->orderService->updateStatus($holdOrder->id, 'cancelled', 'DOKU');
                    }
                }
            }
        }
    }

}
