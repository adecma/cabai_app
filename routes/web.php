<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', 'Auth\LoginController@showLoginForm');
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
});
