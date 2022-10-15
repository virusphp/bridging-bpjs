<?php

use Symfony\Component\HttpFoundation\Request;
use Vclaim\Bridging\GenerateBpjs;
use Vclaim\Bridging\PesertaController;
use Bpjs\Bridging\ReferensiController;


// Route::get('sample', function() {
// 	$generate = new GenerateBpjs;
// 	return $generate->generateSignature(config("bpjs.api.consid"), config("bpjs.api.seckey"));
// });

// Route::get('referensi/diagnosa/{kode}', function($kode){
// 	$referensi = new ReferensiController();
// 	$referensi = $referensi->getDiagnosa($kode);
// 	return $referensi;
// });

// Route::get('referensi/poli/{kode}', function($kode){
// 	$referensi = new ReferensiController();
// 	$referensi = $referensi->getPoli($kode);
// 	return $referensi;
// });

// Route::get('ref/poli', function() {
// 	$referensi = new ReferensiController();;
// 	$referensi = $referensi->getPoliAntrol();
// 	return $referensi;
// });

// Route::get('ref/dokter', function() {
// 	$referensi = new ReferensiController();;
// 	$referensi = $referensi->getDokterAntrol();
// 	return $referensi;
// });

// Route::post('antrean/add', function(Request $request) {
// 	$referensi = new ReferensiController($request);;
// 	$referensi = $referensi->postAntrian($request);
// 	return $referensi;
// });

// Route::post('antrean/updatewaktu', function(Request $request) {
// 	$referensi = new ReferensiController($request);;
// 	$referensi = $referensi->updateAntrian($request);
// 	return $referensi;
// });

// Route::get('referensi/dokter/pelayanan/{pelayanan}/tglpel/{tglpel}/spesialis/{kode}', function($pelayanan, $tglpel, $kode){
// 	$referensi = new ReferensiController();
// 	$referensi = $referensi->getDokter($pelayanan, $tglpel, $kode);
// 	return $referensi;
// });

// Route::get('peserta/nokartu/{nokartu}/tglsep/{tglsep}', function($nokartu, $tglsep){
// 	$referensi = new PesertaController();
// 	$referensi = $referensi->getPeserta($nokartu, $tglsep);
// 	return $referensi;
// });

// // Route::get('rencana/listpoli/jnskontrol/{jnsKontrol}/nomor/{nomor}/tglrencana/{tglRencana}', function($jnsKontrol, $nomor, $tglRencana) {
// // 	$referensi = new ReferensiController();
// // 	$referensi = $referensi->getPoliKontnrol($jnsKontrol, $nomor, $tglRencana);
// // 	return $referensi;
// // });

// Route::get('rencana/liskontrol/bulan/{bulan}/tahun/{tahun}/nokartu/{nokartu}/filer/{filter}', function($bulan, $tahun, $nokartu, $filter) {
// 	$referensi = new ReferensiController();
// 	$referensi = $referensi->getListKontrol($bulan, $tahun, $nokartu, $filter);
// 	return $referensi;
// });

// Route::get('dpjp/pelayanan/{pelayanan}/tglpelayanan/{tglpelayanan}/spesialis/{spesialis}', function($pelayanan, $tglpelayanan, $spesialis) {
// 	$referensi = new ReferensiController();
// 	$referensi = $referensi->getDokter($pelayanan, $tglpelayanan, $spesialis);
// 	return $referensi;
// });

// Route::get('rujukan/keluar/list/tglmulai/{tglmulai}/tglakhir/{tglakhir}', function($tglmulai, $tglakhir) {
// 	$referensi = new ReferensiController();
// 	$referensi = $referensi->getListRujukan($tglmulai, $tglakhir);
// 	return $referensi;
// });


// // Route::get('kontrol/list/tglawal/{tglawal}/tglakhir/{tglakhir}/filter/{tglkontrol}', function($tglawal, $tglakhir, $tglkontrol) {
// // 	$referensi = new ReferensiController();
// // 	$referensi = $referensi->getDataSUrat($tglawal, $tglakhir, $tglkontrol);
// // 	return $referensi;
// // });

// // Route::get('kontrol/dokter/jnskontrol/{jnskontrol}/poli/{poli}/tglkontrol/{tglkontrol}', function($jnsKontrol, $kodePoli, $tglKontrol) {
// // 	$referensi = new ReferensiController();
// // 	$referensi = $referensi->getJadwalDokter($jnsKontrol, $kodePoli, $tglKontrol);
// // 	return $referensi;
// // });

// // Route::get('rencanakontrol/nosuratkontrol/{suratkontrol}', function($sep) {
// // 	$referensi = new ReferensiController();
// // 	$referensi = $referensi->cariSuratKontrol($sep);
// // 	return $referensi;
// // });

// Route::get('sep/{sep}', function($sep) {
// 	$referensi = new ReferensiController();
// 	$referensi = $referensi->cariSep($sep);
// 	return $referensi;
// });

// Route::get('sep/internal/{sep}', function($sep) {
// 	$referensi = new ReferensiController();
// 	$referensi = $referensi->cariSepInternal($sep);
// 	return $referensi;
// });

// // Route::post('create/sep', function(Request $request) {
// // 	$referensi = new ReferensiController($request);
// // 	$referensi = $referensi->postSEP($request);
// // 	return $referensi;
// // });

// Route::post('delete/sep', function(Request $request) {
// 	$referensi = new ReferensiController($request);
// 	$referensi = $referensi->deleteSep($request);
// 	return $referensi;
// });

// Route::post('delete/rujukan', function(Request $request) {
// 	$referensi = new ReferensiController($request);
// 	$referensi = $referensi->deleteRujukan($request);
// 	return $referensi;
// });

// Route::post('delete/sepinternal', function(Request $request) {
// 	$referensi = new ReferensiController($request);
// 	$referensi = $referensi->deleteSepInternal($request);
// 	return $referensi;
// });

// Route::post('update/pulang', function(Request $request) {
// 	$referensi = new ReferensiController($request);
// 	$referensi = $referensi->updatePulang($request);
// 	return $referensi;
// });

// Route::post('create/suratperintah', function(Request $request) {
// 	$referensi = new ReferensiController($request);
// 	$referensi = $referensi->postSuratPerintah($request);
// 	return $referensi;
// });

// Route::post('create/suratkontrol', function(Request $request) {
// 	$referensi = new ReferensiController($request);
// 	$referensi = $referensi->postSuratKontrol($request);
// 	return $referensi;
// });

// Route::get('cari/suratkontrol/{nosurat}', function($nosurat) {
// 	$referensi = new ReferensiControllposter();
// 	$referensi = $referensi->getCariSurat($nosurat);
// 	return $referensi;
// });

// // Route::get('decomporessed', function() {
// // 	$referensi = new ReferensiController();
// // 	$referensi = $referensi->decompressed();
// // 	return $referensi;
// // });

// Route::get('rujukan/{rujukan}', function($rujukan) {
// 	$referensi = new ReferensiController();
// 	$referensi = $referensi->cariRujukan($rujukan);
// 	return $referensi;
// });

// Route::get('rujukan/rs/{rujukan}', function($rujukan) {
// 	$referensi = new ReferensiController();
// 	$referensi = $referensi->cariRujukanRs($rujukan);
// 	return $referensi;
// });

// // Route::get('rujukan/peserta/{nomor}', function($nomor) {
// // 	$referensi = new ReferensiController();
// // 	$referensi = $referensi->cariRujukanPeserta($nomor);
// // 	return $referensi;
// // });

// Route::get('mon/historipelayanan/nokartu/{nomor}/tglmulai/{tglmulai}/tglakhir/{tglakhir}', function($nomor, $tglmulai, $tglakhir) {
// 	$referensi = new ReferensiController();
// 	$referensi = $referensi->cariHistori($nomor, $tglmulai, $tglakhir);
// 	return $referensi;
// });

// Route::get('dashboard/waktutunggu/tanggal/{tanggal}/waktu/{waktu}', function($tanggal, $waktu)  {
// 	$referensi = new ReferensiController();
// 	$referensi = $referensi->dashboardTanggal($tanggal, $waktu);
// 	return $referensi;
// });

// Route::get('rujukan/jumlahsep/{jnsrujukan}/{norujukan}', function($jnsrujukan, $norujukan) {
// 	$referensi = new ReferensiController();
// 	$referensi = $referensi->jumlahSep($jnsrujukan, $norujukan);
// 	return $referensi;
// });

// // Route::get('rujukan/list/peserta/{peserta}', function($rujukan) {
// // 	$referensi = new ReferensiController();
// // 	$referensi = $referensi->cariRujukanListPcare($rujukan);
// // 	return $referensi;
// // });

// // Route::get('fasyankesx', function() {
// // 	dd("KOK GAK SAMPE SINI");
// // 	// $tempattidur = new TempatTidurController();
// // 	// $tempattidur = $tempattidur->getTempatTidur();
// // 	// return $tempattidur;
// // });
