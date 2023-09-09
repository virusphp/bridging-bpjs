<?php

namespace Bpjs\Bridging;

use Bpjs\Bridging\Antrol\BridgeAntrol;
use Bpjs\Bridging\Icare\BridgeIcare;
use Bpjs\Bridging\Vclaim\BridgeVclaim;
use Symfony\Component\HttpFoundation\Request;

Class ReferensiController 
{
	// use Bpjs;	
	protected $bridging;
	protected $antrol;
	protected $icare;
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
		$this->bridging = new BridgeVclaim();
		$this->antrol = new BridgeAntrol();
		$this->icare = new BridgeIcare;
	}

	public function getDiagnosa($kode)
	{
		$endpoint = 'referensi/diagnosa/'. $kode;
		return $this->bridging->getRequest($endpoint);
	}

	public function getPoli($kode)
	{
		$endpoint = 'referensi/poli/'. $kode;
		return $this->bridging->getRequest($endpoint);
	}

	public function getPoliAntrol()
	{
		$endpoint = 'ref/poli';
		return $this->antrol->getRequest($endpoint);
	}

	public function getDokterAntrol()
	{
		$endpoint = 'ref/dokter';
		return $this->antrol->getRequest($endpoint);
	}

	public function postAntrian(Request $request)
	{
		$endpoint = 'antrean/add';
		$data = $request->all();
		return $this->antrol->postRequest($endpoint, $data, "POST");
	}

	public function updateAntrian(Request $request)
	{
		$endpoint = 'antrean/updatewaktu';
		$data = $request->all();
		return $this->antrol->postRequest($endpoint, $data, "POST");
	}

	public function getPoliKontnrol($jnsKontrol, $nomor, $tglRencana)
	{
		$endpoint = 'RencanaKontrol/ListSpesialistik/JnsKontrol/'.$jnsKontrol. '/nomor/'.$nomor.'/TglRencanaKontrol/'.$tglRencana;
		return $this->bridging->getRequest($endpoint);
	}

	public function getListKontrol($bulan, $tahun, $nokartu, $filter)
	{
		$endpoint = "RencanaKontrol/ListRencanaKontrol/Bulan/{$bulan}/Tahun/{$tahun}/Nokartu/{$nokartu}/filter/{$filter}";
		return $this->bridging->getRequest($endpoint);
	}

	public function getDokter($pelayanan, $tglPelayanan, $spesialis)
	{
		$endpoint = 'referensi/dokter/pelayanan/'.$pelayanan.'/tglPelayanan/'.$tglPelayanan.'/Spesialis/'.$spesialis;
		return $this->bridging->getRequest($endpoint);
	}

	public function getListRujukan($tglmulai, $tglakhir)
	{
		$endpoint  = "Rujukan/Keluar/List/tglMulai/{$tglmulai}/tglAkhir/{$tglakhir}";
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

	public function cariSep($nosep)
	{
		$endpoint = "SEP/{$nosep}";
		return $this->bridging->getRequest($endpoint);
	}

	public function cariSuratKontrol($nosep)
	{
		$endpoint = "RencanaKontrol/noSuratKontrol/{$nosep}";
		return $this->bridging->getRequest($endpoint);
	}

	public function cariSepInternal($nosep)
	{
		$endpoint = "SEP/Internal/{$nosep}";
		return $this->bridging->getRequest($endpoint);
	}

	public function postSEP(Request $request)
	{
		$endpoint = 'SEP/2.0/insert';
		$data = $request->all();
		return $this->bridging->postRequest($endpoint,$data);
	}

	public function deleteSep(Request $request)
	{
		$endpoint = "SEP/2.0/delete";
		$data = $request->all();
		return $this->bridging->deleteRequest($endpoint,$data);
	}

	public function deleteSepInternal(Request $request)
	{
		$endpoint = "SEP/Internal/delete";
		$data = $request->all();
		return $this->bridging->deleteRequest($endpoint,$data);
	}

	public function updatePulang(Request $request)
	{
		$endpoint = "SEP/2.0/updtglplg";
		$data = $request->all();
		return $this->bridging->putRequest($endpoint,$data);
	}

	public function decompressed()
	{
		$string = "e0GidhtXDQLftE2O2PXx6IFbJxAWc36xyOihLSNDdGyLSIuvSbWIomLRNWmLBTsCaDTgcT8cP7tzSdokmQFZE27SmOQhzVOrVVCdCY69NGKP9sGWxsD3VKIM25gz7KKeii17z2Gy8ViiQqo0Rbl6UWHmYsPIYcFrWDNzxsh2TnyuX1mQsMDxLjReDCj2sMMnJeFlZBI\/ntW6c9DaSwv88ZwRd06ydlXLmk\/9WBIWG2QJPpAB7ck2rVm4Dt3pK29oZKOkt\/w\/tjnkG1uSaLpCLyZd1ePHT\/f9m7i\/U9\/4M2XIpN4Kv4EJiNSAuReEZpZxKSniQCUq8EU4Ehq\/rB1Gsiy6vQ6h0+fVRFTBKcisQNrwf2Jr1S6baCDR8oYKWwXYNZJsBRJhb2CDDWcc0JAy3qnc9gmbL3biHdMAue5y55sfJTuF7B9AshKX\/+Ke6kTVoL7TtEDIzFTWqphwLyOx17iY8PetIhQJTKUIphpkfja3qUp+LvNRMqey4MA++9r5ebzLaF0E+sSoKN4NPnwZbIitohUtIs1dtZNr5qIezLPui\/PJXWL6zIp1hDSKVeNJQAE5T+626Ae6ajexqHKiN9wQ4S2REkSsuxRTHMT1TFqkP55r\/ZuLy3Xs7tTo7zaY8+xhiswD5PyqUBOzWFGNdKLJbQmzc4\/N4WjdmoXXzECOGT1agzyKuwfARcZGVef0";
		$string1 = "DJW11EJGblMxoxnrpJGyX5iqw0A92fWHw8pWytjby4SNfU2ijr5tgNi1aNlMYf6vudDchoW4BLSLpkeDTh59SlS51LwOw88+YIdSGlL8Jo90vBiXoZDXD8jPcuuOGLIBSxP6xijU/rM89HRnXnv96Ap6p96mcTpPwPexB3MGiaOLvAww1QMk77IVoYPQ/DNF9+qAp8+fJb9QFbRzXYQ29nkzAh3m/N9q8X9evgOv/Jn/4oa330U14+x/sK4Dvrza5+pIJZAv8IILi2J4MXvGfc0YyKtn3jmvRJpbFnJ13UY8QG90pImJwCcFwdxXyC/VQ47ReHo14RukZ10vgX3frAi+vwYMi5Nr5yc+jUv/OS0Yl+7nFOdE2oKi6yfe9TdxEUG3R8dplsuhs1T12AwJBXTPZ8vI2qBTq5N9jsSW8NM=";
		$key1 = "11895rsk24t0n1640762772";
		$key = "11895rsk24t0n". GenerateBpjs::bpjsTimestamp();
		$data = GenerateBpjs::decompress(GenerateBpjs::stringDecrypt($key1, $string1));
		return response($data);
	}

	public function cariRujukan($rujukan)
	{
		$endpoint = "Rujukan/{$rujukan}";
		return $this->bridging->getRequest($endpoint);
	}

	public function cariRujukanRs($rujukan)
	{
		$endpoint = "Rujukan/RS/{$rujukan}";
		return $this->bridging->getRequest($endpoint);
	}
	
	public function cariRujukanPeserta($nomor)
	{
		$endpoint = "Rujukan/Peserta/{$nomor}";
		return $this->bridging->getRequest($endpoint);
	}

	public function deleteRujukan(Request $request)
	{
		$endpoint = "Rujukan/delete";
		$data = $request->all();
		return $this->bridging->deleteRequest($endpoint,$data);
	}

	public function cariHistori($nomor, $tglmulai, $tglakhir)
	{
		// dd($nomor, $tglakhir, $tglakhir);
		$endpoint = "monitoring/HistoriPelayanan/NoKartu/{$nomor}/tglMulai/{$tglmulai}/tglAkhir/{$tglakhir}";
		return $this->bridging->getRequest($endpoint);
	}

	public function cariRujukanListPcare($rujukan)
	{
		$endpoint = "Rujukan/List/Peserta/{$rujukan}";
		return $this->bridging->getRequest($endpoint);
	}

	public function jumlahSep($jnsRujukan, $noRujukan)
	{
		$endpoint = "Rujukan/JumlahSEP/{$jnsRujukan}/{$noRujukan}";
		return $this->bridging->getRequest($endpoint);
	}

	public function dashboardTanggal($tanggal, $waktu)
	{
		$endpoint = "dashboard/waktutunggu/tanggal/{$tanggal}/waktu/{$waktu}";
		return $this->antrol->getRequest($endpoint);
	}

	public function getHistoryPelayanan($nokartu, $kodedokter)
	{
		$data['param'] = $nokartu;
		$data['kodedokter'] = (int)$kodedokter;
		$data = json_encode($data);
		$endpoint = "api/rs/validate";
		return $this->icare->postRequest($endpoint, $data);
	}
}