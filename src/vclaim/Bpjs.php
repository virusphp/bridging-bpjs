<?php

namespace Vclaim\Bridging;

use Vclaim\Bridging\GenerateBpjs;
use Dotenv\Dotenv;
use GuzzleHttp\Client;

trait Bpjs
{
	protected $client;
    protected $headerVclaim;

	public function __construct()
	{
		$dotenv = Dotenv::createUnsafeImmutable(getcwd());
		$dotenv->safeLoad();	

		$this->client = new Client([
			'verify' => true,
			'cookie' => true,
		]);

        $this->headerVclaim = $this->setHeaderVclaim();
	}

	public function setConsid()
	{
        return getenv('CONS_ID');
	}

	public function setSeckey()
	{
        return getenv('SECRET_KEY');
	}

	public function setServiceApiVclaim()
	{
		return getenv('API_BPJS_VCLAIM');
	}

	public function setUserKeyVclaim()
	{
		return getenv('USER_KEY_VCLAIM');
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

	public function setHeaderVclaim()
	{
		return [
			'X-cons-id'   => $this->setConsid(),
			'X-timestamp' => $this->setTimestamp(),
			'X-signature' => $this->setSignature(),
			'user_key'    => $this->setUserKeyVclaim()
		];
	}

	protected function keyDecryptVclaim() 
    {
        return $this->setConsid().$this->setSeckey().$this->headerVclaim['X-timestamp'];
    }

    public function setHeadersVclaim()
    {
        return array_merge($this->headerVclaim, $this->setUrlEncode());
    }
}