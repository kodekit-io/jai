<?php

namespace App\Service;

use Carbon\Carbon;
use DNS1D;
use PDF;
use Illuminate\Support\Facades\Mail;
use Log;
use App\Mail\OrderCompleted;

class Ticket
{
    /**
     * @var Galasys
     */
    private $galasysService;
    /**
     * @var Order
     */
    private $orderService;

    /**
     * Payment constructor.
     * @param Galasys $galasysService
     * @param Order $orderService
     */
    public function __construct(Galasys $galasysService, Order $orderService)
    {

        $this->galasysService = $galasysService;
        $this->orderService = $orderService;
    }

    public function process($orderId)
    {
        // Generate e-tickets
        $orderDetails = $this->galasysService->getTickets($orderId);
        $tickets = $orderDetails['tickets']['ticket'];

        if (isset($tickets['ticketname'])) {
            $barcode = $tickets['barcode'];
            $ticketName = $tickets['ticketname'];
            $code = $tickets['tkid'];
        } else {
            foreach ($tickets as $ticket) {
                $barcode = $ticket['barcode'];
                $ticketName = $ticket['ticketname'];
                $code = $ticket['tkid'];
            }
        }

        $eTicketFileName = $this->generateTicket($orderId, $barcode, $ticketName);
        $this->galasysService->saveGalasysTicket($orderId, $code, $ticketName, $barcode, $eTicketFileName);

        // update status
        $this->orderService->updateStatus($orderId, 'barcode-generated');

        // Send email
        $order = $this->orderService->getOrderById($orderId);
        Mail::to($order->email)->send(new OrderCompleted($order));
        $this->orderService->updateStatus($orderId, 'email-sent');
    }

    public function processOld($orderId)
    {
        // Generate e-tickets
        $orderDetails = $this->galasysService->getTickets($orderId);

        foreach ($orderDetails as $orderDetail) {
            $tickets = $orderDetail->Tickets;
            foreach ($tickets as $ticket) {
                $barcode = $ticket->TicketBarcode;
                $ticketName = $ticket->TicketName;
                $code = $ticket->ItemCode;
                $eTicketFileName = $this->generateTicket($orderId, $barcode, $ticketName);
                $this->galasysService->saveGalasysTicket($orderId, $code, $ticketName, $barcode, $eTicketFileName);
            }
        }

        // update status
        $this->orderService->updateStatus($orderId, 'barcode-generated');

        // Send email
        $order = $this->orderService->getOrderById($orderId);
        Mail::to($order->email)->send(new OrderCompleted($order));
        $this->orderService->updateStatus($orderId, 'email-sent');
    }

    private function generateTicket($orderId, $barcode, $ticketName)
    {
        // generate barcode
//        Log::warning('Barcode generated started');
        $galasysBarcode = DNS1D::getBarcodePNGPath($barcode, "EAN13", 2.5, 40);
//        Log::warning('Barcode generated finished ===> ' . $galasysBarcode);

        // generate e-ticket
//        Log::warning('PDF generated started');
        $order = $this->orderService->getOrderById($orderId);
        $data['galasysBarcode'] = $galasysBarcode;
        Log::warning('public_path ==> ' . public_path(''));
        Log::warning('barcode ==> ' . $galasysBarcode);
        Log::warning('url ==> ' . url('frontend/img/eticket/eticket.png'));
//        Log::warning('url ===> ' . url('/'));
        $data['visitDate'] = Carbon::createFromFormat('Y-m-d', $order->visit_date)->format('l, d F Y');
        $data['orderDate'] = Carbon::createFromFormat('Y-m-d H:i:s', $order->created_at)->format('d M Y');
        $data['ticketName'] = $ticketName;
        $data['visitorName'] = $order->name;
        $data['visitorEmail'] = $order->email;
        $data['lang'] = $order->lang;

        $pdf = PDF::loadView('emails.e_ticket', $data);
        $pdf->setPaper('A4', 'landscape');
        $eTicketFileName = 'uploads/e-tickets/' . str_slug($ticketName) .'-'. $barcode .'.pdf';
        if ($pdf->save(public_path($eTicketFileName))) {
//            Log::warning('Barcode generated finished ===> ' . $eTicketFileName);
            return $eTicketFileName;
        }
    }
}