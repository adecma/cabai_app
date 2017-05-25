<?php
//use Auth;

Route::get('/', function () {
	if (!Auth::user()) {
		return view('welcome');
	}
    return view('home');;
})->name('beranda');

Route::get('page1', function () {
	$penyakits = App\Penyakit::orderBy('name', 'asc')->get();

    return view('page.page1', compact('penyakits'));
})->name('infopenyakit');

Route::get('konsultasi', 'KonsultasiController@index')->name('konsultasi.index');
Route::get('konsultasi/gejala', 'KonsultasiController@gejala')->name('konsultasi.gejala');
Route::post('konsultasi/gejala', 'KonsultasiController@proses')->name('konsultasi.proses');
Route::get('konsultasi/result/{id}', 'KonsultasiController@result')->name('konsultasi.result');
Route::get('/konsultasi/cetak/{id}', 'KonsultasiController@cetak')->name('konsultasi.cetak');
Route::get('/konsultasi/pdf/{id}/{time}', 'KonsultasiController@pdf')->name('konsultasi.pdf');

//Route::get('/', 'Auth\LoginController@showLoginForm');
Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/home', 'HomeController@index');
Route::get('/profil', 'HomeController@showProfil')
    ->name('profil.show');
Route::get('/profil/edit', 'HomeController@editProfil')
	->name('profil.edit');
Route::post('/profil/edit', 'HomeController@updateProfil')
    ->name('profil.update');

Route::group(['middleware' => 'auth'], function() {
	Route::get('/gejala/cetak', 'GejalaController@cetak')->name('gejala.cetak');
	Route::get('/gejala/pdf/{time}', 'GejalaController@pdf')->name('gejala.pdf');
	Route::resource('gejala', 'GejalaController', ['except' => 'show']);

	Route::get('/penyakit/cetak', 'PenyakitController@cetak')->name('penyakit.cetak');
	Route::get('/penyakit/pdf/{time}', 'PenyakitController@pdf')->name('penyakit.pdf');
	Route::resource('penyakit', 'PenyakitController');

	Route::get('/hubungan/cetak', 'HubunganController@cetak')->name('hubungan.cetak');
	Route::get('/hubungan/pdf/{time}', 'HubunganController@pdf')->name('hubungan.pdf');
	Route::resource('hubungan', 'HubunganController');

	Route::get('/riwayat/{id}/cetak', 'RiwayatController@showCetak')->name('riwayat.showCetak');
	Route::get('/riwayat/{id}/pdf/{time}', 'RiwayatController@showPdf')->name('riwayat.showPdf');
	Route::get('/riwayat/cetak', 'RiwayatController@cetak')->name('riwayat.cetak');
	Route::get('/riwayat/pdf/{time}', 'RiwayatController@pdf')->name('riwayat.pdf');
	Route::resource('riwayat', 'RiwayatController', ['except' => ['create', 'store', 'edit', 'update']]);
});
