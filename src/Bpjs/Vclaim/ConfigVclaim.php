<?php

namespace Bpjs\Bridging\Vclaim;

use Bpjs\Bridging\ManageService;
use Bpjs\Bridging\GenerateBpjs;
use Dotenv\Dotenv;

class ConfigVclaim extends ManageService
{
    protected $urlEndpoint;
    protected $consId;
    protected $secretKey;
    protected $userKey;
    protected $header;
    protected $timestamps;

    public function __construct()
    {
        $dotenv = Dotenv::createUnsafeImmutable(getcwd());
		$dotenv->safeLoad();

        $this->urlEndpoint = getenv('API_BPJS_VCLAIM');
        $this->consId = getenv('CONS_ID');
        $this->secretKey = getenv('SECRET_KEY');
        $this->userKey = getenv('USER_KEY_VCLAIM');
    }

    public function setUrl()
    {
       return $this->urlEndpoint; 
    }

    public function setConsId()
    {
       return $this->consId; 
    }

    public function setSecretKey()
    {
       return $this->secretKey; 
    }

    public function setUserKey()
    {
       return $this->userKey; 
    }

    public function setTimestamp()
    {
        return GenerateBpjs::bpjsTimestamp();
    }

    public function setsignature()
    {
        return GenerateBpjs::generateSignature($this->setConsId(), $this->setSecretKey());
    }

    public function setUrlEncode()
	{
		return array('Content-Type' => 'Application/x-www-form-urlencoded');
	}

	public function setUrlJson()
	{
		return array('Content-Type' => 'Application/Json');
	}

    public function setHeader()
	{
		return [
            'Accept' => 'application/json',
			'X-cons-id'   => $this->setConsid(),
			'X-timestamp' => $this->setTimestamp(),
			'X-signature' => $this->setSignature(),
			'user_key'    => $this->setUserKey()
		];
	}

    public function keyDecrypt($timestamp) 
    {
        return $this->setConsid().$this->setSecretKey().$timestamp;
    }

    public function setHeaders($header)
    {
        return array_merge($header, $this->setUrlEncode());
    }
}