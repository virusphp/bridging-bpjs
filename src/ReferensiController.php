<?php

namespace Virusphp\BridingBpjs;

Class ReferensiController extends Bpjs
{
	protected $bridging;
	/**
	 * default Request example 
	 * Result Service Bpjs Referensi
	 * $client = new BridgingBpjs(
	 * 		String $consid,
	 * 		String $timestamp,
	 * 		String $signature
	 * 		String $key
     * );
     *
	 */
	public function __construct()
	{
		parent::__construct();
		$this->bridging = new BridgingBpjs($this->consid, $this->timestamp, $this->signature, $this->key);
	}

	public function getDiagnosa($kode)
	{
		$endpoint = 'referensi/diagnosa/'. $kode;
		return $this->bridging->getRequest($endpoint);
	}
}