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
                'body' => '<body><action>saleticket</action><id>192.168.1.110</id><paymode>3</paymode><tickets>3295,1,7800000|3249,2,500</tickets><begindate>2015-08-30</begindate><sign>D41D8CD98F00B204E9800998ECF8427E</sign></body>'
            ]
        ]);
        $body = $response->getBody();
        $contents = $body->getContents();

        $xml = simplexml_load_string($contents);
        $json = json_encode($xml);
        $array = json_decode($json,TRUE);
        // $tickets = $array['ticketini'];
        dd($array['tickets']);
    }
}
