<?php

namespace Bpjs\Bridging\Icare;

// use Bpjs\Bridging\Bridge;
use Bpjs\Bridging\CurlFactory;

class BridgeIcare extends CurlFactory
{
    protected $config;
    protected $response;
    protected $header;
    protected $headers;

    public function __construct()
    {
        // parent::__construct();
        $this->config = new ConfigIcare;
        $this->response = new ResponseIcare;
        $this->header = $this->config->setHeader();
    }

    public function getRequest($endpoint)
    {
        $result = $this->requestIcare($this->config->setUrl().$endpoint, $this->header);
        $result = $this->response->responseIcare($result, $this->config->keyDecrypt($this->header['X-timestamp']));
        return $result;
    }

    public function getRequestNew($endpoint)
    {
        $result = $this->requestIcare($this->config->setUrl().$endpoint, $this->header);
        $result = $this->response->responseIcare($result, $this->config->keyDecrypt($this->header['X-timestamp']));
        return $result;
    }

    public function postRequest($endpoint, $data)
    {
        $result = $this->requestIcare($this->config->setUrl().$endpoint, $this->header, "POST", $data);
        $result = $this->response->responseIcare($result, $this->config->keyDecrypt($this->header['X-timestamp']));
        return $result;
    }

    public function putRequest($endpoint, $data)
    {
        $result = $this->requestIcare($this->config->setUrl().$endpoint, $this->header, "PUT", $data);
        $result = $this->response->responseIcare($result,  $this->config->keyDecrypt($this->header['X-timestamp']));
        return $result;
    }

    public function deleteRequest($endpoint, $data)
    {
        $result = $this->requestIcare($this->config->setUrl().$endpoint, $this->header, "DELETE", $data);
        $result = $this->response->responseIcare($result, $this->config->keyDecrypt($this->header['X-timestamp']));
        return $result;
    }

    public function deleteResponseNoDecrypt($endpoint, $data)
    {
        $result = $this->requestIcare($this->config->setUrl().$endpoint, $this->header, "DELETE", $data);
        return $result;
    }

}