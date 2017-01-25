<?php

namespace App\Http\Controllers;

use App\Mail\OrderCompleted;
use App\Service\Cimb;
use App\Service\Doku;
use App\Service\Galasys;
use App\Service\Holiday;
use App\Service\Order;
use App\Service\Package;
use App\Service\Payment;
use App\Service\Post;
use DNS1D;
use GuzzleHttp\Client;
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
     * @var Post
     */
    private $postService;
    /**
     * @var Doku
     */
    private $dokuService;
    /**
     * @var Cimb
     */
    private $cimbService;

    /**
     * TicketController constructor.
     * @param Galasys $galasys
     * @param Package $packageService
     * @param Holiday $holidayService
     * @param Order $orderService
     * @param Doku $dokuService
     * @param Cimb $cimbService
     * @param Post $postService
     */
    public function __construct(
        Galasys $galasys,
        Package $packageService,
        Holiday $holidayService,
        Order $orderService,
        Doku $dokuService,
        Cimb $cimbService,
        Post $postService
    )
    {
        $this->galasys = $galasys;
        $this->packageService = $packageService;
        $this->holidayService = $holidayService;
        $this->orderService = $orderService;
        $this->postService = $postService;
        $this->dokuService = $dokuService;
        $this->cimbService = $cimbService;
    }

    public function getAvailablePackages(Request $request)
    {
        $visitDateRequest = $request->input('visit_date');
        $packages = $this->packageService->getAvailablePackages($visitDateRequest);

        return $packages;
    }

    public function ticket($lang)
    {
        $pageId = config('misc.statics.ticket-hours');
        $params = [
            'lang' => $lang,
            'id' => $pageId
        ];
        $postWithDetail = $this->postService->getPostsWithDetail($params)->first();

        $params = [
            'package_type_id' => 2,
            'lang' => $lang,
            'is_general_admission' => 1,
        ];
        $packages = $this->packageService->getPackages($params);

<<<<<<< HEAD
        $galasysProducts = $this->packageService->getAllPackages();

=======
>>>>>>> master
        $post = $this->postService->getPost(['id' => $pageId]);
        $openingHours = $post->metas()->where('meta_key', 'openingHours-' . $lang)->first();

        $colors = [
            'cyan darken-1',
            'grey darken-1',
            'light-blue darken-4',
            'amber darken-1',
            'cyan darken-1',
            'grey darken-1',
            'light-blue darken-4',
            'amber darken-1'
        ];

        $data['minDate'] = Carbon::today()->addDays(7)->format('d-m-Y');
        $data['galasysProducts'] = $galasysProducts;
        $data['packages'] = $packages;
        $data['pageTitle'] = $postWithDetail->title;
        $data['packages'] = $packages;
        $data['post'] = $postWithDetail;
        $data['openingHours'] = $openingHours;
<<<<<<< HEAD
        $data['colors'] = $colors;
=======
        $data['lang'] = $lang;
>>>>>>> master

        return view('frontend.ticket-hours', $data);
    }

    public function bookTicket(Request $request, $lang, $orderId = '')
    {
//        var_dump($request->all()); exit();
        if ($orderId != '') {
            $order = $this->orderService->getOrderById($orderId);
        } else {
            if (! $request->has('products')) {
                return redirect($lang . '/ticket-hours');
            }
            $details = $this->orderService->getOrderDetails($request->only(['products']), $lang);
            $personalData = $request->only(['visit_date', 'order_name', 'order_email', 'order_phone']);

            $order = $this->orderService->saveOrder($personalData, $details);
        }

        // doku
        $dokuParams = $this->dokuService->getDokuParameters($order->id);
        $dokuUrl = config('payments.doku.api_url');
        $data['dokuUrl'] = $dokuUrl;
        $data['dokuParams'] = $dokuParams;

        //cimb
        $cimbParams = $this->cimbService->getCimbParameters($order->id);
        $cimbUrl = config('payments.cimb.api_url');
        $data['cimbUrl'] = $cimbUrl;
        $data['cimbParams'] = $cimbParams;

        $data['visitDate'] = Carbon::createFromFormat('Y-m-d', $order->visit_date)->format('l, d-M-Y');
        $data['details'] = $order->details;
        $data['subTotal'] = $order->sub_total;
        $data['tax'] = $order->tax;
        $data['grandTotal'] = $order->total_amount;

        $data['pageTitle'] = 'Ticket Details';

        return view('frontend.book-detail', $data);
    }

    public function sendEmail()
    {
        $order = $this->orderService->getOrderById(96);
        Mail::to('jamal@kleur.id')->send(new OrderCompleted($order));
    }

    public function generatePdf()
    {
        $data['barcode'] = DNS1D::getBarcodePNGPath("1612190000211", "EAN13", 2.5, 40);
        $pdf = PDF::loadView('emails.e_ticket', $data);
        $pdf->setPaper('A4', 'landscape');
        return $pdf->stream('eticket.pdf');
        // return $pdf->download('eticket.pdf');
    }

    public function galasysOrder()
    {
        $orderDetails = $this->galasys->getTickets(83);
        foreach ($orderDetails as $orderDetail) {
            $tickets = $orderDetail->Tickets;
            foreach ($tickets as $ticket) {
                $barcode = $ticket->TicketBarcode;
                $ticketName = $ticket->TicketName;
                $code = $ticket->ItemCode;

                echo $code.'---'.$ticketName.'---'.$barcode."<br>";
            }
        }
    }

    public function galasysHolidays()
    {
        var_dump($this->galasys->getHolidays()); exit();
    }

    public function emailTemplate()
    {
        $order = $this->orderService->getOrderById(96);
        $data['orderId'] = $order->id;
        $data['name'] = $order->name;
        $data['details'] = $order->details;
        $data['visitDate'] = Carbon::createFromFormat('Y-m-d', $order->visit_date)->format('l, d F Y');
        $data['total'] = number_format($order->total_amount, 0, ',', '.');

        return view('emails.order-completed', $data);
    }

}
