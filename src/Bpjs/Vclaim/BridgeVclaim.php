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
}