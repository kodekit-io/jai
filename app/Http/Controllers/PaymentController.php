<?php

namespace App\Http\Controllers;

use App\Service\Cimb;
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
     * PaymentController constructor.
     * @param Order $orderService
     * @param Doku $dokuService
     * @param Cimb $cimbService
     * @param Ticket $ticketService
     */
    public function __construct(Order $orderService, Doku $dokuService, Cimb $cimbService, Ticket $ticketService)
    {
        $this->orderService = $orderService;
        $this->dokuService = $dokuService;
        $this->cimbService = $cimbService;
        $this->ticketService = $ticketService;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function dokuResult(Request $request)
    {
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
