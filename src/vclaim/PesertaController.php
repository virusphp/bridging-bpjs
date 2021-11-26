<?php

namespace Vclaim\Bridging;

Class PesertaController 
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

	public function getPeserta($nokartu, $tglsep)
	{
		$endpoint = 'Peserta/nokartu/'. $nokartu. '/tglSEP/'. $tglsep;
		return $this->bridging->getRequest($endpoint);
	}
}