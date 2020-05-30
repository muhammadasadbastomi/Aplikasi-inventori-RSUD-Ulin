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
Route::get('/admin/satuan/edit', 'SatuanController@edit')->name('satuanEdit');
Route::post('/admin/satuan/edit/{id}', 'SatuanController@update')->name('satuanUpdate');
Route::delete('/admin/satuan/delete/{id}', 'SatuanController@destroy')->name('satuanDelete');

Route::get('/admin/barang', 'BarangController@index')->name('barangIndex');
Route::post('/admin/barang', 'BarangController@create')->name('barangCreate');
Route::get('/admin/barang/edit', 'BarangController@edit')->name('barangEdit');
Route::post('/admin/barang/edit/{id}', 'BarangController@update')->name('barangUpdate');
Route::delete('/admin/barang/delete/{id}', 'BarangController@destroy')->name('barangDelete');
