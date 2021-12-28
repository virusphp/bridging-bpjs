<?php

namespace Kemkes\Bridging;

use Kemkes\Bridging\GenerateKemkes;
use Dotenv\Dotenv;

trait Kemkes
{
	public function __construct()
	{
		$dotenv = Dotenv::createUnsafeImmutable(__DIR__);
		$dotenv->load();	
	}

    public function setUserId()
    {
        return getenv('USER_SIRS');
    }

    public function setPassid()
    {
        return getenv('PASS_SIRS');
    }

  	public function setServiceApi()
	{
		return getenv('API_KEMKES');
	}

	public function setTimestamp()
	{
        return GenerateKemkes::kemkesTimestamp();
	}

    public function setUrlEncode()
	{
		return array('Content-Type' => 'Application/x-www-form-urlencoded');
	}

	public function setHeader()
	{
		return [
			'x-rs-id'   => $this->setUserId(),
			'x-Timestamp' => $this->setTimestamp(),
			'x-pass' => $this->setPassid()
		];
	}

    public function setHeaders()
	{
		return array_merge($this->setHeader(), $this->setUrlEncode());
	}
}