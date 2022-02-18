<?php

namespace Vclaim\Bridging;

use Vclaim\Bridging\GenerateBpjs;
use GuzzleHttp\Exception\RequestException;
use Vclaim\Bridging\Bpjs;

class BridgingBpjs 
{
    use Bpjs;

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

    public function getRequestAntrol($endpoint)
    {
        try {
            $url = $this->setServiceApi() . $endpoint;
            $response = $this->client->get($url, ['headers' => $this->header]);
            $result = GenerateBpjs::responseBpjsV2Antrol($response->getBody()->getContents(), $this->keyDecrypt());
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

    public function postRequestNoEncrypt($endpoint, $data)
    {
         try {
            $url = $this->setServiceApi() . $endpoint;
            $response = $this->client->post($url, ['headers' => $this->setHeaders(), 'body' => $data]);
			$result = $response->getBody()->getContents();
            return $result;
        } catch (RequestException $e) {
            $result =$e->getRequest();
            if ($e->hasResponse()) {
                $result = $e->getResponse();
            }
        } 
    }

    public function postRequestAntrol($endpoint, $data)
    {
        try {
            $url = $this->setServiceApi() . $endpoint;
            $response = $this->client->post($url, ['headers' => $this->setHeaders(), 'body' => $data]);
			$result = GenerateBpjs::responseBpjsV2Antrol($response->getBody()->getContents(),$this->keyDecrypt());
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

    public function putRequestAntrol($endpoint, $data)
    {
        try {
            $url = $this->setServiceApi() . $endpoint;
            $response = $this->client->put($url, ['headers' => $this->setHeaders(), 'body' => $data]);
			$result = GenerateBpjs::responseBpjsV2Antrol($response->getBody()->getContents(),$this->keyDecrypt());
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

    public function deleteRequestNoEncrypt($endpoint, $data)
    {
        // $data = file_get_contents("php://input");
        try {
            $url = $this->setServiceApi() . $endpoint;
            $response = $this->client->delete($url, ['headers' => $this->setHeaders(), 'body' => $data]);
			$result = $response->getBody()->getContents();
            return $result;
        } catch (RequestException $e) {
            $result =$e->getRequest();
            if ($e->hasResponse()) {
                $result = $e->getResponse();
            }
        } 
    }
}