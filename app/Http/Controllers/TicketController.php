<?php

namespace App\Http\Controllers;

use App\Mail\OrderCompleted;
use App\Service\Galasys;
use App\Service\Holiday;
use App\Service\Order;
use App\Service\Package;
use App\Service\Payment;
use DNS1D;
use PDF;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Log;

class TicketController extends Controller
{
    /**
     * @var Galasys
     */
    private $galasys;
    /**
     * @var Package
     */
    private $packageService;
    /**
     * @var Holiday
     */
    private $holidayService;
    /**
     * @var Order
     */
    private $orderService;
    /**
     * @var Payment
     */
    private $paymentService;

    /**
     * TicketController constructor.
     * @param Galasys $galasys
     * @param Package $packageService
     * @param Holiday $holidayService
     * @param Order $orderService
     * @param Payment $paymentService
     */
    public function __construct(
        Galasys $galasys,
        Package $packageService,
        Holiday $holidayService,
        Order $orderService,
        Payment $paymentService
    )
    {
        $this->galasys = $galasys;
        $this->packageService = $packageService;
        $this->holidayService = $holidayService;
        $this->orderService = $orderService;
        $this->paymentService = $paymentService;
    }

    public function getAvailablePackages(Request $request)
    {
        $visitDateRequest = $request->input('visit_date');
        $packages = $this->packageService->getAvailablePackages($visitDateRequest);

        return $packages;
    }

    public function ticket($lang)
    {
        $generalAdmissionParams = [
            'lang' => $lang,
            'is_general_admission' => 1
        ];
        $generalPackages = $this->packageService->getPackages($generalAdmissionParams);

        $data['generalPackages'] = $generalPackages;

        $data['pageTitle'] = 'Ticket &amp; Hours';

        return view('frontend.ticket-hours', $data);
    }

    public function bookTicket(Request $request, $lang, $orderId = '')
    {
//        var_dump($request->all()); exit();
        if ($orderId != '') {
            $order = $this->orderService->getOrderById($orderId);
        } else {
            $details = $this->orderService->getOrderDetails($request->only(['products']), $lang);
            $personalData = $request->only(['visit_date', 'order_name', 'order_email', 'order_phone']);

            $order = $this->orderService->saveOrder($personalData, $details);
        }

        $dokuParams = $this->paymentService->getDokuParameters($order->id);

        $dokuUrl = config('doku.doku.api_url');
        $data['dokuUrl'] = $dokuUrl;
        $data['dokuParams'] = $dokuParams;
        $data['details'] = $order->details;
        $data['subTotal'] = $order->sub_total;
        $data['tax'] = $order->tax;
        $data['grandTotal'] = $order->total_amount;

        $data['pageTitle'] = 'Ticket Details';

        return view('frontend.book-detail', $data);
    }

    public function sendEmail()
    {
        Mail::to('pasha.md5@gmail.com')->send(new OrderCompleted());
    }

    public function generatePdf()
    {
        $pdf = PDF::loadView('emails.order-completed');
        return $pdf->download('invoice.pdf');
    }

    public function generateBarcode()
    {
        echo DNS1D::getBarcodePNGPath("161217000021", "EAN13");
    }
}
