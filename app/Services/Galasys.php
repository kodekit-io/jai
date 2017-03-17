<?php

namespace App\Service;


use App\Models\GalasysTicket;
use Carbon\Carbon;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

/**
 * @property Client client
 */
class Galasys
{
    protected $client;
    /**
     * @var Order
     */
    private $orderService;

    /**
     * Galasys constructor.
     * @param Order $orderService
     */
    public function __construct(Order $orderService)
    {
        $galasysBaseUri = config('galasys.base_uri');
        $this->client = new Client(['base_uri' => $galasysBaseUri]);
        $this->orderService = $orderService;
    }

    public function getProducts()
    {
        $response = $this->client->request('GET', '/entrance.aspx', [
            'query' => [
                'body' => '<body><action>deviceini</action><DeviceID></DeviceID><DeviceIP>192.168.1.100</DeviceIP><sign>D41D8CD98F00B204E9800998ECF8427E</sign></body>'
            ]
        ]);
        $body = $response->getBody();
        $contents = $body->getContents();
        $xml = simplexml_load_string($contents);
        $json = json_encode($xml);
        $array = json_decode($json,TRUE);
        // dd($contents);
        $tickets = $array['ticketini'];

        return $tickets;

    }

    public function getTickets($orderId)
    {
        $order = $this->orderService->getOrderById($orderId);
        $visitDate = $order->visit_date;
        $createdAtUTC = Carbon::createFromFormat('Y-m-d H:i:s', $order->created_at, 'Asia/Jakarta')->format('Y-m-d\TH:i:s\Z');
        $visitDateUTC = Carbon::createFromFormat('Y-m-d', $visitDate, 'Asia/Jakarta')->format('Y-m-d\TH:i:s\Z');
        $orderDetails = $order->details;
        $details = '<tickets>';
        $x = 0;
        foreach ($orderDetails as $orderDetail) {
            if ($x > 0) {
                $details .= '|';
            }
            $details .=  $orderDetail->galasys_product_id . ',' . $orderDetail->qty . ',' . $orderDetail->price;
            $x++;
        }
        $details .= '</tickets>';

        $requestBody = '<body><action>saleticket</action><id>192.168.1.110</id><paymode>3</paymode>' . $details . '<begindate>' . $visitDate . '</begindate><sign>D41D8CD98F00B204E9800998ECF8427E</sign></body>';

        $response = $this->client->request('GET', '/entrance.aspx', [
            'query' => [
                'body' => $requestBody
            ]
        ]);

        $body = $response->getBody();
        $contents = $body->getContents();
        $xml = simplexml_load_string($contents);
        $json = json_encode($xml);
        $array = json_decode($json,TRUE);

        return $array;


//        $details = [];
//        foreach ($orderDetails as $orderDetail) {
//            for ($i = 0; $i < $orderDetail->qty; $i++) {
//                $detailArr = [
//                    'OrderDate' => $createdAtUTC,
//                    'VisitDate' => $visitDateUTC,
//                    'ItemCode' => $orderDetail->galasys_product_id,
//                    'Quantity' => 1,
//                    'OnlinePrice' => $orderDetail->price,
//                    'TotalPrice' => $orderDetail->price
//                ];
//                $details[] = $detailArr;
//            }
//        }
//
//        $arrData = [
//            'TaxInvoiceNumber' => $orderId,
//            'OrderNumber' => $orderId,
//            'FirstName' => $order->name,
//            'Email' => $order->email,
//            'PurchaseDate' => $createdAtUTC,
//            'VisitDate' => $visitDateUTC,
//            'OrderDetails' => $details
//        ];
//        $data = \GuzzleHttp\json_encode($arrData);
//
//        $headers = [
//            'Authorization' => $this->getAuthorizationCode(),
//            'Content-Type' => 'application/json'
//        ];
//
//        $request = new Request('POST', '/api/Order', $headers, $data);
//        $response = $this->client->send($request);
//
//        $content = $this->parseResponse($response);
//
//        return $content->OrderDetails;

    }

    public function getProductsOld()
    {
        $headers = [
            'Authorization' => $this->getAuthorizationCode(),
            'Content-Type' => 'application/json'
        ];
        $request = new Request('GET', '/api/Products', $headers);
        $response = $this->client->send($request);
        $content = $this->parseResponse($response);

        return $content;
    }

    public function getHolidays()
    {
        $headers = [
            'Authorization' => $this->getAuthorizationCode(),
            'Content-Type' => 'application/json'
        ];
        $request = new Request('GET', '/api/Holidays', $headers);
        $response = $this->client->send($request);
        $content = $this->parseResponse($response);

        return $content;
    }

    public function getTicketsOld($orderId)
    {
        $order = $this->orderService->getOrderById($orderId);
        $visitDate = $order->visit_date;
        $createdAtUTC = Carbon::createFromFormat('Y-m-d H:i:s', $order->created_at, 'Asia/Jakarta')->format('Y-m-d\TH:i:s\Z');
        $visitDateUTC = Carbon::createFromFormat('Y-m-d', $visitDate, 'Asia/Jakarta')->format('Y-m-d\TH:i:s\Z');
        $orderDetails = $order->details;
        $details = [];
        foreach ($orderDetails as $orderDetail) {
            for ($i = 0; $i < $orderDetail->qty; $i++) {
                $detailArr = [
                    'OrderDate' => $createdAtUTC,
                    'VisitDate' => $visitDateUTC,
                    'ItemCode' => $orderDetail->galasys_product_id,
                    'Quantity' => 1,
                    'OnlinePrice' => $orderDetail->price,
                    'TotalPrice' => $orderDetail->price
                ];
                $details[] = $detailArr;
            }
        }

        $arrData = [
            'TaxInvoiceNumber' => $orderId,
            'OrderNumber' => $orderId,
            'FirstName' => $order->name,
            'Email' => $order->email,
            'PurchaseDate' => $createdAtUTC,
            'VisitDate' => $visitDateUTC,
            'OrderDetails' => $details
        ];
        $data = \GuzzleHttp\json_encode($arrData);

        $headers = [
            'Authorization' => $this->getAuthorizationCode(),
            'Content-Type' => 'application/json'
        ];

        $request = new Request('POST', '/api/Order', $headers, $data);
        $response = $this->client->send($request);

        $content = $this->parseResponse($response);

        return $content->OrderDetails;

    }

    protected function parseResponse($response)
    {
        $body = $response->getBody();
        $contents = $body->getContents();
        $content = \GuzzleHttp\json_decode($contents);

        return $content;
    }

    public function saveGalasysTicket($orderId, $code, $name, $barcode, $eTicket)
    {
        return GalasysTicket::create([
            'order_id' => $orderId,
            'name' => $name,
            'code' => $code,
            'barcode' => $barcode,
            'e_ticket' => $eTicket
        ]);
    }

    private function getAuthorizationCode()
    {
        return 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJVc2VyTmFtZSI6InJlZHNwYWNlIiwiRW1haWwiOiJyZWRzcGFjZUBleGFtcGxlLmNvbSIsIlJvbGUiOiJNZXJjaGFudCJ9.33W1uSifUOep1D0TNw0M01Szl0rr6Jk90Q3GRF3rfbs';
    }
}