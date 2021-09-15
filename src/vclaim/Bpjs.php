<?php

namespace Vclaim\Bridging;

use Vclaim\Bridging\GenerateBpjs;

trait Bpjs
{

	public function setConsid()
	{
        return config('bpjs.api.consid');
	}

	public function setSeckey()
	{
        return config('bpjs.api.seckey');
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
        return GenerateBpjs::keyString($this->setConsid(), $this->setSeckey());
	}

	public function setUrlEncode()
	{
		return array('Content-Type' => 'Application/x-www-form-urlencoded');
	}

	public function setHeader()
	{
		return [
			'X-cons-id'   => $this->setConsid(),
			'X-timestamp' => $this->setTimestamp(),
			'X-signature' => $this->setSignature()
		];
	}

	public function setHeaders()
	{
		return array_merge($this->setHeader(), $this->setUrlEncode());
	}

	public function setServiceApi()
	{
		return config('bpjs.api.endpoint'); 
	}

}