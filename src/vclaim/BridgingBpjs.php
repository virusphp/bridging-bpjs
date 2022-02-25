<?php

namespace Vclaim\Bridging;

use Vclaim\Bridging\GenerateBpjs;
use GuzzleHttp\Exception\RequestException;
use Vclaim\Bridging\Bpjs;

class BridgingBpjsxx
{
    use Bpjs;

	public function getRequestVclaim($endpoint)
    {
        try {
            $url = $this->setServiceApiVclaim() . $endpoint;
            $response = $this->client->get($url, ['headers' => $this->headerVclaim]);
            $result = GenerateBpjs::responseBpjsV2($response->getBody()->getContents(), $this->keyDecryptVclaim());
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

	public function postRequestVclaim($endpoint, $data)
    {
        //  $data = file_get_contents("php://input");
        try {
            $url = $this->setServiceApiVclaim() . $endpoint;
            $response = $this->client->post($url, ['headers' => $this->setHeadersVclaim(), 'body' => $data]);
			$result = GenerateBpjs::responseBpjsV2($response->getBody()->getContents(),$this->keyDecryptVclaim());
            return $result;
        } catch (RequestException $e) {
            $result =$e->getRequest();
            if ($e->hasResponse()) {
                $result = $e->getResponse();
            }
        } 
    }

    public function postRequestNoEncryptVclaim($endpoint, $data)
    {
         try {
            $url = $this->setServiceApiVclaim() . $endpoint;
            $response = $this->client->post($url, ['headers' => $this->setHeadersVclaim(), 'body' => $data]);
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

    public function putRequestVclaim($endpoint, $data)
    {
        try {
            $url = $this->setServiceApiVclaim() . $endpoint;
            $response = $this->client->put($url, ['headers' => $this->setHeadersVclaim(), 'body' => $data]);
			$result = GenerateBpjs::responseBpjsV2($response->getBody()->getContents(),$this->keyDecryptVclaim());
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

    public function deleteRequestVclaim($endpoint, $data)
    {
        // $data = file_get_contents("php://input");
        try {
            $url = $this->setServiceApiVclaim() . $endpoint;
            $response = $this->client->delete($url, ['headers' => $this->setHeadersVclaim(), 'body' => $data]);
			$result = GenerateBpjs::responseBpjsV2($response->getBody()->getContents(),$this->keyDecryptVclaim());
            return $result;
        } catch (RequestException $e) {
            $result =$e->getRequest();
            if ($e->hasResponse()) {
                $result = $e->getResponse();
            }
        } 
    }

    public function deleteRequestNoEncryptVclaim($endpoint, $data)
    {
        try {
            $url = $this->setServiceApiVclaim() . $endpoint;
            $response = $this->client->delete($url, ['headers' => $this->setHeadersVclaim(), 'body' => $data]);
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