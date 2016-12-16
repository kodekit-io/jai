<?php

namespace App\Service;


use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

/**
 * @property Client client
 */
class Galasys
{
    protected $client;

    /**
     * Galasys constructor.
     */
    public function __construct()
    {
        $galasysBaseUri = config('galasys.base_uri');
        $this->client = new Client(['base_uri' => $galasysBaseUri]);
    }

    public function getProducts()
    {
        $headers = [
            'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJVc2VyTmFtZSI6InJlZHNwYWNlIiwiRW1haWwiOiJyZWRzcGFjZUBleGFtcGxlLmNvbSIsIlJvbGUiOiJNZXJjaGFudCJ9.33W1uSifUOep1D0TNw0M01Szl0rr6Jk90Q3GRF3rfbs',
            'Content-Type' => 'application/json'
        ];
        $request = new Request('GET', '/api/Products', $headers);
        $response = $this->client->send($request);
        $content = $this->parseResponse($response);

        return $content;
    }

    protected function parseResponse($response)
    {
        $body = $response->getBody();
        $contents = $body->getContents();
        $content = \GuzzleHttp\json_decode($contents);

        return $content;
    }
}