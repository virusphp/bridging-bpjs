<?php

namespace Vclaim\Bridging;

use Vclaim\Bridging\GenerateBpjs;

class Bpjs
{
	protected $consid;
    protected $seckey;
	protected $timestamp;
	protected $signature;
	protected $key;

	public function __construct()
	{
        $this->consid    = config('bpjs.api.consid');
        $this->seckey    = config('bpjs.api.seckey');
        $this->timestamp = GenerateBpjs::bpjsTimestamp();
        $this->key       = GenerateBpjs::keyString($this->consid, $this->seckey);
        $this->signature = GenerateBpjs::generateSignature($this->consid,$this->seckey);
	}
}