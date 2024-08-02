<?php

namespace Kemkes\Bridging\Sirs;

use Kemkes\Bridging\CurlFactory;

class BridgeSirs extends CurlFactory
{
    protected $config;
    protected $response;
    protected $header;
    protected $headers;

    public function __construct()
    {
        $this->config = new ConfigSirs;
        $this->header = $this->config->setHeader();
    }

    public function getRequest($endpoint)
    {
        $result = $this->request($this->config->setUrl() . $endpoint, $this->header);
        return $result;
    }

    public function postRequest($endpoint, $data)
    {
        $result = $this->request($this->config->setUrl() . $endpoint, $this->header, "POST", $data);
        return $result;
    }

    public function putRequest($endpoint, $data)
    {
        $result = $this->request($this->config->setUrl() . $endpoint, $this->header, "PUT", $data);
        return $result;
    }

    public function deleteRequest($endpoint, $data)
    {
        $result = $this->request($this->config->setUrl() . $endpoint, $this->header, "DELETE", $data);
        return $result;
    }
}
