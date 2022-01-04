<?php

use Illuminate\Support\Facades\Route;

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
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/penerima_donasi', 'PenerimaDonasiController@index')->name('penerimaList');
Route::get('/penyaluran_barang', 'PenyaluranBarangController@index')->name('penyaluranBarangList');
Route::get('/penyaluran_barang/create', 'PenyaluranBarangController@create')->name('penyaluranBarangForm');
Route::post('/penyaluran_barang/create', 'PenyaluranBarangController@store')->name('penyaluranBarangSave');
Route::get('/penyaluran_barang/delete/{penyaluranBarang}', 'PenyaluranBarangController@destroy')->name('penyaluranBarangDelete');
Route::get('/penyaluran_barang/edit/{penyaluranBarang}', 'PenyaluranBarangController@edit')->name('penyaluranBarangEdit');
Route::post('/penyaluran_barang/edit/{penyaluranBarang}', 'PenyaluranBarangController@update')->name('penyaluranBarangUpdate');
Route::get('/donasi_barang', 'DonasiBarangController@index')->name('donasiBarangList');
Route::get('/donasi_barang/create', 'DonasiBarangController@create')->name('donasiBarangForm');
Route::get('/donasi_barang/edit/{donasi_barang}', 'DonasiBarangController@edit')->name('donasiBarangEdit');
Route::post('/donasi_barang/edit/{donasi_barang}', 'DonasiBarangController@update')->name('donasiBarangUpdate');
Route::get('/donasi_barang/delete/{donasi_barang}', 'DonasiBarangController@destroy')->name('donasiBarangDelete');
Route::post('/donasi_barang/create', 'DonasiBarangController@store')->name('donasiBarangSave');
Route::get('/penerima_donasi/create', 'PenerimaDonasiController@create')->name('penerimaForm');
Route::post('/penerima_donasi/create', 'PenerimaDonasiController@store')->name('penerimaSave');
Route::get('/penerima_donasi/delete/{penerima_donasi}', 'PenerimaDonasiController@destroy')->name('penerimaDelete');
Route::get('/penerima_donasi/edit/{penerima_donasi}', 'PenerimaDonasiController@edit')->name('penerimaEdit');
Route::post('/penerima_donasi/edit/{penerima_donasi}', 'PenerimaDonasiController@update')->name('penerimaUpdate');
Route::get('/donatur', 'DonaturController@index')->name('DonaturList');
Route::get('/donatur/create', 'DonaturController@create')->name('DonaturForm');
Route::post('/donatur/create', 'DonaturController@store')->name('DonaturSave');
Route::get('/donatur/edit/{donatur}', 'DonaturController@edit')->name('DonaturEdit');
Route::post('/donatur/edit/{donatur}', 'DonaturController@update')->name('DonaturUpdate');
Route::get('/donatur/delete/{donatur}', 'DonaturController@destroy')->name('DonaturDelete');
Route::get('/donasi_uang', 'DonasiUangController@index')->name('donasiUangList');
Route::get('/donasi_uang/create', 'DonasiUangController@create')->name('donasiUangForm');
Route::get('/donasi_uang/edit/{donasi_uang}', 'DonasiUangController@edit')->name('donasiUangEdit');
Route::post('/donasi_uang/edit/{donasi_uang}', 'DonasiUangController@update')->name('donasiUangUpdate');
Route::get('/donasi_uang/delete/{donasi_uang}', 'DonasiUangController@destroy')->name('donasiUangDelete');
Route::post('/donasi_uang/create', 'DonasiUangController@store')->name('donasiUangSave');
Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});

