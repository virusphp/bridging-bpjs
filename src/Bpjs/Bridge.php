<?php 

namespace Bpjs\Bridging;

use GuzzleHttp\Client;

class Bridge
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client([
			'verify' => true,
			'cookie' => true,
		]);
    }

    public function httpGet($endpoint, $header)
    {
        try {
            $response = $this->client->get($endpoint, ['headers' => $header]);
            $result = $response->getBody()->getContents();
            return $result;
        } catch (RequestException $e) {
            $result = $e->getRequest();
            if ($e->hasResponse()) {
                $result = $e->getResponse();
            }
        } 
    } 
}