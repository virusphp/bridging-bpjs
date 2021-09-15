<?php

namespace Virusphp\BridingBpjs;

use Virusphp\BridingBpjs\GenerateBpjs;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7;
use GuzzleHttp\Exception\RequestException;
use function GuzzleHttp\Psr7\str;

class BridgingBpjs 
{
	protected $key;

	protected $header;

	protected $headers;

	protected $bpjs_endpoint;

	protected $urlencode;

	protected $client;

	public function __construct($consid, $timestamp, $signature, $key)
	{
		$this->key = $key;
		
		$this->urldecode = array('Content-Type' => 'Application/x-www-form-urlencoded');

		$this->header = [
			'X-cons-id'   => $consid,
			'X-timestamp' => $timestamp,
			'X-signature' => $signature
		];

		$this->headers = array_merge($this->header, $this->urldecode);

		$this->bpjs_url = config('bpjs.api.endpoint');

		$this->client = new Client([
			'verify' => true,
			'cookie' => true,
		]);
	}

	public function getRequest($endpoint)
    {
        try {
            $url = $this->bpjs_url . $endpoint;
            $response = $this->client->get($url, ['headers' => $this->header]);
            $result = GenerateBpjs::responseBpjsV2($response->getBody()->getContents(), $this->key);
            return $result;
        } catch (RequestException $e) {
            $result = str($e->getRequest());
            if ($e->hasResponse()) {
                $result = str($e->getResponse());
            }
        } 
    }

	public function postRequest($endpoint, $data)
    {
        $data = file_get_contents("php://input");
        try {
            $url = $this->bpjs_url . $endpoint;
            $response = $this->client->post($url, ['headers' => $this->headers, 'body' => $data]);
			$result = GenerateBpjs::responseBpjsV2($response->getBody()->getContents(), $this->key);
            return $result();
        } catch (RequestException $e) {
            $result = Psr7\str($e->getRequest());
            if ($e->hasResponse()) {
                $result = str($e->getResponse());
            }
        } 
    }
}