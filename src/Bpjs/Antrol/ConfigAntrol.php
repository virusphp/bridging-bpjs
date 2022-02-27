<?php

namespace Bpjs\Bridging\Vclaim;

use Bpjs\Bridging\ManageService;
use Bpjs\Bridging\GenerateBpjs;
use Dotenv\Dotenv;

class ConfigAntrol extends ManageService
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

        $this->urlEndpoint = config('antrol.api.endpoint') ?? getenv('API_BPJS_ANTROL');
        $this->consId = config('antrol.api.consid') ?? getenv('CONS_ID');
        $this->secretKey = config('antrol.api.secretkey') ?? getenv('SECRET_KEY');
        $this->userKey = config('antrol.api.userkey') ?? getenv('USER_KEY_ANTROL');

        $this->header = $this->setHeader();
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
			'X-cons-id'   => $this->setConsid(),
			'X-timestamp' => $this->setTimestamp(),
			'X-signature' => $this->setSignature(),
			'user_key'    => $this->setUserKey()
		];
	}

    public function keyDecrypt() 
    {
        return $this->setConsid().$this->setSecretKey().$this->header['X-timestamp'];
    }

    public function setHeaders()
    {
        return array_merge($this->header, $this->setUrlEncode());
    }
}