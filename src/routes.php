<?php

use Kemkes\Bridging\TempatTidurController;
use Vclaim\Bridging\GenerateBpjs;
use Vclaim\Bridging\ReferensiController;

Route::get('sample', function() {
	$generate = new GenerateBpjs;
	return $generate->generateSignature(config("bpjs.api.consid"), config("bpjs.api.seckey"));
});

Route::get('referensi/{kode}', function($kode){
	$referensi = new ReferensiController();
	$referensi = $referensi->getDiagnosa($kode);
	return $referensi;
});

Route::get('fasyankesx', function() {
	dd("KOK GAK SAMPE SINI");
	// $tempattidur = new TempatTidurController();
	// $tempattidur = $tempattidur->getTempatTidur();
	// return $tempattidur;
});