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

// Penyewaan
Route::get('/', 'PenyewaanController@index');
Route::get('/sewa/{id}', 'PenyewaanController@penyewaan');
Route::post('/sewa', 'PenyewaanController@sewa');
Route::get('/history', 'PenyewaanController@history');
Route::get('/konfirmasi/{id}', 'PenyewaanController@konfirmasi');
Route::post('/konfirmasi', 'PenyewaanController@uploadBukti');
Route::get('/invoice/{id}', 'PenyewaanController@invoice');


// auth
Route::get('/login', 'AuthController@index');
Route::post('/login', 'AuthController@login');
Route::get('/register', 'AuthController@registerPage');
Route::post('/register', 'AuthController@register');
Route::get('/logout', 'AuthController@logout');

//admin

Route::get('/admin/login', 'AdminController@loginPage');
Route::post('/admin/login', 'AdminController@login');
Route::get('/admin', 'AdminController@index');

Route::get('/data-gedung', 'AdminController@dataGedung');
Route::get('/ubah-data-gedung/{id}', 'AdminController@editGedung');
Route::post('/ubah-data-gedung', 'AdminController@updateGedung');
Route::get('/tambah-gedung', 'AdminController@tambahGedung');
Route::post('/tambah-gedung/', 'AdminController@simpanData');
Route::get('/hapus-gedung/{id}', 'AdminController@hapusGedung');

Route::get('/data-pelanggan', 'AdminController@dataPelanggan');
Route::get('/tambah-pelanggan', 'AdminController@tambahPelanggan');
Route::post('/tambah-pelanggan', 'AdminController@simpanDataPelanggan');
Route::get('/hapus-pelanggan/{id}', 'AdminController@hapusPelanggan');

Route::get('/data-penyewaan', 'AdminController@dataPenyewaan');
Route::get('/detail-penyewaan/{id}', 'AdminController@detailPenyewaan');

Route::get('/data-pembayaran', 'AdminController@dataPembayaran');
Route::get('/detail-pembayaran/{id}', 'AdminController@detailPembayaran');
Route::get('/bukti-pembayaran/{id}', 'AdminController@buktiPembayaran');






