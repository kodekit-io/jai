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

        $post = $this->postService->getPost(['id' => $pageId]);
        $openingHours = $post->metas()->where('meta_key', 'openingHours-' . $lang)->first();

        $data['pageTitle'] = $postWithDetail->title;
        $data['packages'] = $packages;
        $data['post'] = $postWithDetail;
        $data['openingHours'] = $openingHours;
        $data['lang'] = $lang;

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
        $data['barcode'] = DNS1D::getBarcodePNGPath("1612190000211", "EAN13", 2.5, 40);
        $pdf = PDF::loadView('emails.order-completed', $data);
        $pdf->setPaper('A4', 'landscape');
        return $pdf->stream('eticket.pdf');
        // return $pdf->download('eticket.pdf');
    }

}
