<?php

namespace Bpjs\Bridging\Aplicare;

use Bpjs\Bridging\CurlFactory;

class BridgeAplicares extends CurlFactory
{
    protected $config;
    protected $header;
    protected $headers;

    public function __construct()
    {
        $this->config = new ConfigAplicares;
        $this->header = $this->config->setHeader();
    }

    public function getRequest($endpoint)
    {
        $result = $this->requestIcare($this->config->setUrl().$endpoint, $this->header);
        return $result;
    }

    public function getRequestNew($endpoint)
    {
        $result = $this->requestIcare($this->config->setUrl().$endpoint, $this->header);
        return $result;
    }

    public function postRequest($endpoint, $data)
    {
        $result = $this->requestIcare($this->config->setUrl().$endpoint, $this->header, "POST", $data);
        return $result;
    }

    public function putRequest($endpoint, $data)
    {
        $result = $this->requestIcare($this->config->setUrl().$endpoint, $this->header, "PUT", $data);
        return $result;
    }

    public function deleteRequest($endpoint, $data)
    {
        $result = $this->requestIcare($this->config->setUrl().$endpoint, $this->header, "DELETE", $data);
        return $result;
    }

}