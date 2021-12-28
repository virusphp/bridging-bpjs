<?php

namespace Kemkes\Bridging;

use Kemkes\Bridging\Kemkes;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class BridgingKemkes
{
    use Kemkes;

	protected $client;

	public function __construct()
	{
		$this->client = new Client([
			'verify' => true,
			'cookie' => true,
		]);
	}

    public function getRequest($endpoint)
    {
        try {
            $url = $this->setServiceApi() . $endpoint;
            $response = $this->client->get($url, ['headers' => $this->setHeader()]);
			$result = $response->getBody()->getContents();
            return $result;
        } catch (RequestException $e) {
            $result = $e->getRequest();
            if ($e->hasResponse()) {
                $result = $e->getResponse();
            }
        } 
    }

	public function postRequest($endpoint, $data)
    {
        $data = file_get_contents("php://input");
        try {
            $url = $this->setServiceApi() . $endpoint;
            $response = $this->client->post($url, ['headers' => $this->setHeaders(), 'body' => $data]);
			$result = $response->getBody()->getContents();
            return $result();
        } catch (RequestException $e) {
            $result =$e->getRequest();
            if ($e->hasResponse()) {
                $result = $e->getResponse();
            }
        } 
    }

     public function putRequest($endpoint, $data)
    {
        try {
            $url = $this->setServiceApi() . $endpoint;
            $response = $this->client->post($url, ['headers' => $this->setHeaders(), 'body' => $data]);
			$result = $response->getBody()->getContents();
            return $result();
        } catch (RequestException $e) {
            $result =$e->getRequest();
            if ($e->hasResponse()) {
                $result = $e->getResponse();
            }
        } 
    }

    public function deleteRequest($endpoint, $data)
    {
        $data = file_get_contents("php://input");
        try {
            $url = $this->setServiceApi() . $endpoint;
            $response = $this->client->post($url, ['headers' => $this->setHeaders(), 'body' => $data]);
			$result = $response->getBody()->getContents();
            return $result();
        } catch (RequestException $e) {
            $result = Psr7\str($e->getRequest());
            if ($e->hasResponse()) {
                $result = Psr7\str($e->getResponse());
            }
        } 
    }

}