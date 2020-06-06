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
    return view('/auth/login');
});

Auth::routes();

Route::group(['middleware' => ['auth', 'Checkrole:1,2']], function () {
    Route::get('/admin', 'HomeController@index')->name('dashboard');

    Route::get('/admin/pemesanan', 'PemesananController@index')->name('pemesananIndex');
    Route::post('/admin/pemesanan', 'PemesananController@store')->name('pemesananStore');
    //Route::get('/admin/pemesanan/edit', 'pemesananController@edit')->name('pemesananEdit');
    Route::put('/admin/pemesanan', 'PemesananController@update')->name('pemesananUpdate');
    Route::delete('/admin/pemesanan/delete/{id}', 'PemesananController@destroy')->name('pemesananDelete');

    Route::get('/admin/pemesanandetail/{id}', 'PemesanandetailController@index')->name('pemesanandetailIndex');
    Route::post('/admin/pemesanandetail/{id}', 'PemesanandetailController@store')->name('pemesanandetailStore');
    //Route::get('/admin/pemesanandetail/edit', 'PemesanandetailController@edit')->name('pemesanandetailEdit');
    Route::put('/admin/pemesananupdate', 'PemesanandetailController@update')->name('pemesananDetailUpdate');
    Route::delete('/admin/pemesanandetail/delete/{id}', 'PemesanandetailController@destroy')->name('pemesanandetailDelete');

    Route::get('/admin/stok', 'StokController@index')->name('stokIndex');
    //Route::post('/admin/stok', 'StokController@store')->name('stokStore');
    //Route::get('/admin/stok/edit', 'stokController@edit')->name('stokEdit');
    //Route::put('/admin/stok', 'StokController@update')->name('stokUpdate');
    //Route::delete('/admin/stok/delete/{id}', 'StokController@destroy')->name('stokDelete');

    Route::get('/admin/user/', 'AdminController@index')->name('userIndex');
    Route::put('/admin/user/', 'AdminController@update')->name('userUpdate');
    //Route::put('/admin/user/', 'AdminController@updatepass')->name('userUpdatepass');



});

Route::group(['middleware' => ['auth', 'Checkrole:1']], function () {

    Route::get('/admin/satuan', 'SatuanController@index')->name('satuanIndex');
    Route::post('/admin/satuan', 'SatuanController@store')->name('satuanStore');
    //Route::get('/admin/satuan/edit', 'SatuanController@edit')->name('satuanEdit');
    Route::put('/admin/satuan', 'SatuanController@update')->name('satuanUpdate');
    Route::delete('/admin/satuan/delete/{id}', 'SatuanController@destroy')->name('satuanDelete');

    Route::get('/admin/merk', 'MerkController@index')->name('merkIndex');
    Route::post('/admin/merk', 'MerkController@store')->name('merkStore');
    //Route::get('/admin/merk/edit', 'MerkController@edit')->name('merkEdit');
    Route::put('/admin/merk', 'MerkController@update')->name('merkUpdate');
    Route::delete('/admin/merk/delete/{id}', 'MerkController@destroy')->name('merkDelete');

    Route::get('/admin/unit', 'UnitController@index')->name('unitIndex');
    Route::post('/admin/unit', 'UnitController@store')->name('unitStore');
    //Route::get('/admin/unit/edit', 'UnitController@edit')->name('unitEdit');
    Route::put('/admin/unit', 'UnitController@update')->name('unitUpdate');
    Route::delete('/admin/unit/delete/{id}', 'UnitController@destroy')->name('unitDelete');

    Route::get('/admin/supplier', 'SupplierController@index')->name('supplierIndex');
    Route::post('/admin/supplier', 'SupplierController@store')->name('supplierStore');
    //Route::get('/admin/supplier/edit', 'SupplierController@edit')->name('supplierEdit');
    Route::put('/admin/supplier', 'SupplierController@update')->name('supplierUpdate');
    Route::delete('/admin/supplier/delete/{id}', 'SupplierController@destroy')->name('supplierDelete');

    Route::get('/admin/barang', 'BarangController@index')->name('barangIndex');
    Route::post('/admin/barang', 'BarangController@store')->name('barangStore');
    //Route::get('/admin/barang/edit', 'BarangController@edit')->name('barangEdit');
    Route::put('/admin/barang', 'BarangController@update')->name('barangUpdate');
    Route::delete('/admin/barang/delete/{id}', 'BarangController@destroy')->name('barangDelete');

    Route::get('/admin/masuk', 'BarangmasukController@index')->name('masukIndex');
    Route::post('/admin/masuk', 'BarangmasukController@store')->name('masukStore');
    //Route::get('/admin/masuk/edit', 'BarangmasukController@edit')->name('masukEdit');
    Route::put('/admin/masuk', 'BarangmasukController@update')->name('masukUpdate');
    Route::delete('/admin/masuk/delete/{id}', 'BarangmasukController@destroy')->name('masukDelete');

    Route::get('/admin/keluar', 'BarangkeluarController@index')->name('keluarIndex');
    Route::post('/admin/keluar', 'BarangkeluarController@store')->name('keluarStore');
    //Route::get('/admin/keluar/edit', 'BarangkeluarController@edit')->name('keluarEdit');
    Route::put('/admin/keluar', 'BarangkeluarController@update')->name('keluarUpdate');
    Route::delete('/admin/keluar/delete/{id}', 'BarangkeluarController@destroy')->name('keluarDelete');

    Route::get('/admin/masukdetail/{id}', 'MasukdetailController@index')->name('masukdetailIndex');
    Route::post('/admin/masukdetail/{id}', 'MasukdetailController@store')->name('masukdetailStore');
    //Route::get('/admin/masukdetail/edit', 'MasukdetailController@edit')->name('masukdetailEdit');
    //Route::put('/admin/masukdetail', 'MasukdetailController@update')->name('masukdetailUpdate');
    Route::delete('/admin/masukdetail/delete/{id}', 'MasukdetailController@destroy')->name('masukdetailDelete');

    Route::get('/admin/keluardetail/{id}', 'keluardetailController@index')->name('keluardetailIndex');
    Route::post('/admin/keluardetail/{id}', 'keluardetailController@store')->name('keluardetailStore');
    //Route::get('/admin/keluardetail/edit', 'keluardetailController@edit')->name('keluardetailEdit');
    //Route::put('/admin/keluardetail', 'keluardetailController@update')->name('keluardetailUpdate');
    Route::delete('/admin/keluardetail/delete/{id}', 'keluardetailController@destroy')->name('keluardetailDelete');

    Route::get('/admin/show/', 'AdminController@show')->name('userShow');
    Route::post('/admin/show/', 'AdminController@store')->name('userStore');
    Route::put('/admin/show/', 'AdminController@edit')->name('userEdit');
    Route::delete('/admin/delete/{id}', 'AdminController@destroy')->name('userDelete');

    Route::get('/admin/laporan/barang', 'CetakController@barang')->name('cetakBarang');
    Route::get('/admin/laporan/unit', 'CetakController@unit')->name('cetakUnit');
    Route::get('/admin/laporan/satuan', 'CetakController@satuan')->name('cetakSatuan');
    Route::get('/admin/laporan/merk', 'CetakController@merk')->name('cetakMerk');
    Route::get('/admin/laporan/supplier', 'CetakController@supplier')->name('cetakSupplier');
    Route::get('/admin/laporan/barangpemesanan', 'CetakController@pemesanan')->name('cetakPemesanan');
    Route::get('/admin/laporan/barangpemesanantgl', 'CetakController@pemesanantgl')->name('cetaktglPemesanan');
    Route::get('/admin/laporan/barangmasuk', 'CetakController@masuk')->name('cetakMasuk');
    Route::get('/admin/laporan/barangmasuktgl', 'CetakController@masuktgl')->name('cetaktglMasuk');
    Route::get('/admin/laporan/barangkeluar', 'CetakController@keluar')->name('cetakKeluar');
    Route::get('/admin/laporan/barangkeluartgl', 'CetakController@keluartgl')->name('cetaktglKeluar');
});
