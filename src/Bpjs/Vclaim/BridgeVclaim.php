<?php

namespace Bpjs\Bridging\Vclaim;

use Bpjs\Bridging\Bridge;

class BridgeVclaim extends Bridge
{
    protected $config;
    protected $response;

    public function __construct()
    {
        parent::__construct();
        $this->config = new ConfigVclaim;
        $this->response = new ResponseVclaim;
    }

    public function getRequest($endpoint)
    {
        $result = $this->httpGet($this->config->setUrl().$endpoint, $this->config->setHeader());
        $result = $this->response->responseVclaim($result, $this->config->keyDecrypt());
        return $result;
    }
    
    public function postRequest($endpoint, $data)
    {
        $result = $this->httpPost($this->config->setUrl().$endpoint, $this->config->setHeaders(), $data);
        $result = $this->response->responseVclaim($result, $this->config->keyDecrypt());
        return $result;
    }

    public function putRequest($endpoint, $data)
    {
        $result = $this->httpPut($this->config->setUrl().$endpoint, $this->config->setHeaders(), $data);
        $result = $this->response->responseVclaim($result, $this->config->keyDecrypt());
        return $result;
    }

    public function deleteRequest($endpoint, $data)
    {
        $result = $this->httpDelete($this->config->setUrl().$endpoint, $this->config->setHeaders(), $data);
        $result = $this->response->responseVclaim($result, $this->config->keyDecrypt());
        return $result;
    }

    public function deleteResponseNoDecrypt($endpoint, $data)
    {
        $result = $this->httpDelete($this->config->setUrl().$endpoint, $this->config->setHeaders(), $data);
        return $result;
    }

}