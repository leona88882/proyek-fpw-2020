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

Route::get('/', "controlLeo@loadlogin");
Route::post('/checklogin','ControlLeo@checklogin');
Route::get('/register','controlLeo@loadregister');
Route::post('/olah_regis','controlLeo@olahregis');
Route::get('/menuadmin','controlLeo@loadadmin');
Route::get('/insertsupplier','controlLeo@load_supplier');
Route::get('/tambahjenisbarang','controlLeo@load_jenis_barang');
Route::get('/insertbarang','controlMaxi@indexInsertBarang');
Route::get('/tambahstockbarang','controlMaxi@indexAddStock');
Route::post('/olah_supplier','controlLeo@olah_supplier');
Route::post('/olah_jenis_barang','controlLeo@olah_jenis_barang');
Route::get('/editpegawai','controlLeo@showpegawai');
Route::post('/detaileditpegawai','controlLeo@editpegawai');
Route::post('/softdelete','controlLeo@softdeletepegawai');
Route::post('/add_barang','controlMaxi@addBarang');
Route::post('/add_stock','controlMaxi@addStockBarang');
Route::post('/olaheditpegawai','controlLeo@olaheditpegawai');
Route::get('/editpegawai','controlLeo@showpegawai');
Route::get('/deletebarang','controlLeo@showbarang');
Route::post('/softbarang','controlLeo@softdeletebarang');
Route::get('/historymasuk','controlRich@historyin');
Route::get('/historypelanggan','controlLeo@dtransout');
Route::post('/htranspelangan','controlLeo@historyout');
Route::get('/historykeluar','controlRich@historyout');
Route::post('/searchin','controlRich@searchin');
Route::get('/search', function(){
    return view('searching');
});
///

