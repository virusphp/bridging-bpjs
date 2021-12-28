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

	public function postSuratPerintah(Request $request)
	{
		$endpoint = 'RencanaKontrol/InsertSPRI';
		$data = $request->all();
		return $this->bridging->postRequest($endpoint,$data);
	}

	public function postSuratKontrol(Request $request)
	{
		$endpoint = 'RencanaKontrol/insert';
		$data = $request->all();
		return $this->bridging->postRequest($endpoint,$data);
	}

	public function getCariSurat($nosurat)
	{
		$endpoint = 'RencanaKontrol/noSuratKontrol/'.$nosurat;
		return $this->bridging->getRequest($endpoint);
	}

	public function getDataSUrat($tglawal, $tglakhir, $tglkontrol)
	{
		$endpoint = 'RencanaKontrol/ListRencanaKontrol/tglAwal/'.$tglawal.'/tglAkhir/'.$tglakhir.'/filter/'.$tglkontrol;
		return $this->bridging->getRequest($endpoint);
	}

	public function getJadwalDokter($jnsKontrol, $kodePoli, $tglKontrol)
	{
		// dd($jnsKontrol,$kodePoli, $tglKontrol);
		$endpoint = 'RencanaKontrol/JadwalPraktekDokter/JnsKontrol/'.$jnsKontrol.'/KdPoli/'.$kodePoli.'/TglRencanaKontrol/'.$tglKontrol;
		return $this->bridging->getRequest($endpoint);
	}

	public function postSEP(Request $request)
	{
		$endpoint = 'SEP/2.0/insert';
		$data = $request->all();
		return $this->bridging->postRequest($endpoint,$data);
	}

	public function updatePulang(Request $request)
	{
		$endpoint = "SEP/2.0/updtglplg";
		$data = $request->all();
		return $this->bridging->putRequest($endpoint,$data);
	}
}