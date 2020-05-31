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

Route::get('/admin', 'HomeController@index')->name('dashboard');

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
Route::post('/admin/barang', 'BarangController@create')->name('barangCreate');
Route::get('/admin/barang/edit', 'BarangController@edit')->name('barangEdit');
Route::post('/admin/barang/edit/{id}', 'BarangController@update')->name('barangUpdate');
Route::delete('/admin/barang/delete/{id}', 'BarangController@destroy')->name('barangDelete');
