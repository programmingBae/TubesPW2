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
Route::get('/donasi_barang', 'DonasiBarangController@index')->name('donasiBarangList');
Route::get('/donasi_barang/create', 'DonasiBarangController@create')->name('donasiBarangForm');
Route::get('/donasi_barang/edit/{donasi_barang}', 'DonasiBarangController@edit')->name('donasiBarangEdit');
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
Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});

