<?php

namespace Vclaim\Bridging;

use Vclaim\Bridging\GenerateBpjs;
use Dotenv\Dotenv;

trait Bpjs
{
	public function __construct()
	{
		$dotenv = Dotenv::createUnsafeImmutable(__DIR__);
		$dotenv->load();	
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

	public function setKey()
	{
        return $this->setConsid().$this->setSeckey().$this->setTimestamp();
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

	public function setHeaders()
	{
		return array_merge($this->setHeader(), $this->setUrlEncode());
	}

}