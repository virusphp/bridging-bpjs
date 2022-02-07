<?php

namespace Vclaim\Bridging;

use Vclaim\Bridging\GenerateBpjs;
use Dotenv\Dotenv;
use GuzzleHttp\Client;

trait Bpjs
{
	protected $client;
    protected $header;

	public function __construct()
	{
		$dotenv = Dotenv::createUnsafeImmutable(getcwd());
		$dotenv->safeLoad();	

		$this->client = new Client([
			'verify' => true,
			'cookie' => true,
		]);

        $this->header = $this->setHeader();
	}

	public function setConsid()
	{
        return getenv('CONS_ID');
	}

	public function setSeckey()
	{
        return getenv('SECRET_KEY');
	}

	public function setServiceApi()
	{
		return getenv('API_BPJS');
	}

	public function setUserKey()
	{
		return getenv('USER_KEY');		
	}

	public function setTimestamp()
	{
        return GenerateBpjs::bpjsTimestamp();
	}

	public function setSignature()
	{
        return GenerateBpjs::generateSignature($this->setConsid(),$this->setSeckey());
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

	protected function keyDecrypt() 
    {
        return $this->setConsid().$this->setSeckey().$this->header['X-timestamp'];
    }

    public function setHeaders()
    {
        return array_merge($this->header, $this->setUrlEncode());
    }
}