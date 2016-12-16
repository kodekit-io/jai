<?php

namespace App\Http\Controllers;

use App\Service\Galasys;
use App\Service\Holiday;
use App\Service\Package;
use Carbon\Carbon;
use Illuminate\Http\Request;
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
     * TicketController constructor.
     */
    public function __construct(Galasys $galasys, Package $packageService, Holiday $holidayService)
    {
        $this->galasys = $galasys;
        $this->packageService = $packageService;
        $this->holidayService = $holidayService;
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
        if ($orderId != '') {
            $order = $this->orderService->getOrderById($orderId);
        } else {
            $details = $this->orderService->getOrderDetails($request->only(['packages']), $lang);
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
}
