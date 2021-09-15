<?php

namespace Vclaim\Bridging;

Class ReferensiController 
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
		$this->bridging = new BridgingBpjs();
	}

	public function getDiagnosa($kode)
	{
		$endpoint = 'referensi/diagnosa/'. $kode;
		return $this->bridging->getRequest($endpoint);
	}
}