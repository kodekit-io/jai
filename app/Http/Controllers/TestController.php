<?php

namespace App\Http\Controllers;

use App\Service\Galasys;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class TestController extends Controller
{
    /**
     * @var Galasys
     */
    private $galasys;


    /**
     * TestController constructor.
     */
    public function __construct(Galasys $galasys)
    {

        $this->galasys = $galasys;
    }

    public function galasysTicket()
    {
        $client = new Client(['base_uri' => env('GLS_BASE_URL')]);
        $response = $client->request('GET', '/entrance.aspx', [
            'query' => [
                'body' => '<body><action>deviceini</action><DeviceID></DeviceID><DeviceIP>192.168.1.100</DeviceIP><sign>D41D8CD98F00B204E9800998ECF8427E</sign></body>'
            ]
        ]);
        $body = $response->getBody();
        $contents = $body->getContents();

        $xml = simplexml_load_string($contents);
        $json = json_encode($xml);
        $array = json_decode($json,TRUE);
        // $tickets = $array['ticketini'];
        dd($array);
    }

    public function galasysGetBarcode()
    {
        $client = new Client(['base_uri' => env('GLS_BASE_URL')]);
        $response = $client->request('GET', '/entrance.aspx', [
            'query' => [
                'body' => '<body><action>saleticket</action><id>192.168.1.110</id><paymode>3</paymode><tickets>3324,2,290000</tickets><begindate>2015-08-30</begindate><sign>D41D8CD98F00B204E9800998ECF8427E</sign></body>'
            ]
        ]);
        $body = $response->getBody();
        $contents = $body->getContents();
        //dd($contents);
        $xml = simplexml_load_string($contents);
        $json = json_encode($xml);
        $array = json_decode($json,TRUE);
        // $tickets = $array['ticketini'];
        $tickets = $array['tickets']['ticket'];
        // 1 product
        if (isset($tickets['ticketname'])) {
            $barcode = $tickets['barcode'];
            $ticketName = $tickets['ticketname'];
            $code = $tickets['tkid'];
            print_r($tickets);
        } else {
            foreach ($tickets as $ticket) {
                $barcode = $ticket['barcode'];
                $ticketName = $ticket['ticketname'];
                $code = $ticket['tkid'];
                print_r($ticket);
            }
        }

        // dd($array['tickets']);
        exit();
    }


    public function rekPonsel()
    {
        return view('tests.rek-ponsel');
    }
}
