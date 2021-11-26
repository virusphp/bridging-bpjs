<?php

namespace Vclaim\Bridging;

use Symfony\Component\HttpFoundation\Request;

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

	public function getPoliKontnrol($jnsKontrol, $nomor, $tglRencana)
	{
		$endpoint = 'RencanaKontrol/ListSpesialistik/JnsKontrol/'.$jnsKontrol. '/nomor/'.$nomor.'/TglRencanaKontrol/'.$tglRencana;
		return $this->bridging->getRequest($endpoint);
	}

	public function getDokter($pelayanan, $tglPelayanan, $spesialis)
	{
		$endpoint = 'referensi/dokter/pelayanan/'.$pelayanan.'/tglPelayanan/'.$tglPelayanan.'/Spesialis/'.$spesialis;
		return $this->bridging->getRequest($endpoint);
	}

	public function postSEP(Request $request)
	{
		$endpoint = 'SEP/2.0/insert';
		$data = $request->all();
		return $this->bridging->postRequest($endpoint,$data);
	}
}