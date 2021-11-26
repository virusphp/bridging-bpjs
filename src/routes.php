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

Route::get('/dpjp/pelayanan/{pelayanan}/tglpelayanan/{tglpelayanan}/spesialis/{spesialis}', function($pelayanan, $tglpelayanan, $spesialis) {
	$referensi = new ReferensiController();
	$referensi = $referensi->getDokter($pelayanan, $tglpelayanan, $spesialis);
	return $referensi;
});

Route::post('create/sep', function(Request $request) {
	$referensi = new ReferensiController($request);
	$referensi = $referensi->postSEP($request);
	return $referensi;
});

