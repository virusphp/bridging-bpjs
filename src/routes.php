<?php

use Symfony\Component\HttpFoundation\Request;
use Vclaim\Bridging\GenerateBpjs;
use Vclaim\Bridging\PesertaController;
use Vclaim\Bridging\ReferensiController;

Route::get('sample', function() {
	$generate = new GenerateBpjs;
	return $generate->generateSignature(config("bpjs.api.consid"), config("bpjs.api.seckey"));
});

Route::get('referensi/diagnosa/{kode}', function($kode){
	$referensi = new ReferensiController();
	$referensi = $referensi->getDiagnosa($kode);
	return $referensi;
});

Route::get('peserta/nokartu/{nokartu}/tglsep/{tglsep}', function($nokartu, $tglsep){
	$referensi = new PesertaController();
	$referensi = $referensi->getPeserta($nokartu, $tglsep);
	return $referensi;
});

Route::get('rencana/listpoli/jnskontrol/{jnsKontrol}/nomor/{nomor}/tglrencana/{tglRencana}', function($jnsKontrol, $nomor, $tglRencana) {
	$referensi = new ReferensiController();
	$referensi = $referensi->getPoliKontnrol($jnsKontrol, $nomor, $tglRencana);
	return $referensi;
});

Route::get('dpjp/pelayanan/{pelayanan}/tglpelayanan/{tglpelayanan}/spesialis/{spesialis}', function($pelayanan, $tglpelayanan, $spesialis) {
	$referensi = new ReferensiController();
	$referensi = $referensi->getDokter($pelayanan, $tglpelayanan, $spesialis);
	return $referensi;
});

Route::get('kontrol/list/tglawal/{tglawal}/tglakhir/{tglakhir}/filter/{tglkontrol}', function($tglawal, $tglakhir, $tglkontrol) {
	$referensi = new ReferensiController();
	$referensi = $referensi->getDataSUrat($tglawal, $tglakhir, $tglkontrol);
	return $referensi;
});

Route::get('kontrol/dokter/jnskontrol/{jnskontrol}/poli/{poli}/tglkontrol/{tglkontrol}', function($jnsKontrol, $kodePoli, $tglKontrol) {
	$referensi = new ReferensiController();
	$referensi = $referensi->getJadwalDokter($jnsKontrol, $kodePoli, $tglKontrol);
	return $referensi;
});

Route::post('create/sep', function(Request $request) {
	$referensi = new ReferensiController($request);
	$referensi = $referensi->postSEP($request);
	return $referensi;
});

Route::post('update/pulang', function(Request $request) {
	$referensi = new ReferensiController($request);
	$referensi = $referensi->updatePulang($request);
	return $referensi;
});

Route::post('create/suratperintah', function(Request $request) {
	$referensi = new ReferensiController($request);
	$referensi = $referensi->postSuratPerintah($request);
	return $referensi;
});

Route::post('create/suratkontrol', function(Request $request) {
	$referensi = new ReferensiController($request);
	$referensi = $referensi->postSuratKontrol($request);
	return $referensi;
});

Route::post('cari/suratkontrol/{nosurat}', function($nosurat) {
	$referensi = new ReferensiController();
	$referensi = $referensi->postCariSurat($nosurat);
	return $referensi;
});


Route::get('fasyankesx', function() {
	dd("KOK GAK SAMPE SINI");
	// $tempattidur = new TempatTidurController();
	// $tempattidur = $tempattidur->getTempatTidur();
	// return $tempattidur;
});
