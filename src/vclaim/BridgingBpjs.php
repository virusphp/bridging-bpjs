<?php

namespace Vclaim\Bridging;

use Vclaim\Bridging\GenerateBpjs;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Vclaim\Bridging\Bpjs;

class BridgingBpjs 
{
    use Bpjs;

	protected $client;
    protected $header;

	public function __construct()
	{
		$this->client = new Client([
			'verify' => true,
			'cookie' => true,
		]);

        $this->header = $this->setHeader();
	}

    protected function keyDecrypt() 
    {
        return $this->setConsid().$this->setSeckey().$this->header['X-timestamp'];
    }

    public function setHeaders()
    {
        return array_merge($this->header, $this->setUrlEncode());
    }

	public function getRequest($endpoint)
    {
        try {
            $url = $this->setServiceApi() . $endpoint;
            $response = $this->client->get($url, ['headers' => $this->header]);
            $result = GenerateBpjs::responseBpjsV2($response->getBody()->getContents(), $this->keyDecrypt());
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
        //  $data = file_get_contents("php://input");
        try {
            $url = $this->setServiceApi() . $endpoint;
            $response = $this->client->post($url, ['headers' => $this->setHeaders(), 'body' => $data]);
			$result = GenerateBpjs::responseBpjsV2($response->getBody()->getContents(),$this->keyDecrypt());
            return $result;
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
            $response = $this->client->put($url, ['headers' => $this->setHeaders(), 'body' => $data]);
			$result = GenerateBpjs::responseBpjsV2($response->getBody()->getContents(),$this->keyDecrypt());
            return $result;
        } catch (RequestException $e) {
            $result =$e->getRequest();
            if ($e->hasResponse()) {
                $result = $e->getResponse();
            }
        } 
    }

    public function deleteRequest($endpoint, $data)
    {
        // $data = file_get_contents("php://input");
        try {
            $url = $this->setServiceApi() . $endpoint;
            $response = $this->client->delete($url, ['headers' => $this->setHeaders(), 'body' => $data]);
			$result = GenerateBpjs::responseBpjsV2($response->getBody()->getContents(),$this->keyDecrypt());
            return $result;
        } catch (RequestException $e) {
            $result =$e->getRequest();
            if ($e->hasResponse()) {
                $result = $e->getResponse();
            }
        } 
    }
}