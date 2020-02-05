<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['auth:api'])->group(function(){

//Karyawan
Route::get('/karyawan','Api\KaryawanController@index');
Route::post('/karyawan', 'Api\KaryawanController@store');
Route::get('/karyawan/{id}','Api\KaryawanController@show');
Route::post('/karyawan/{id}', 'Api\KaryawanController@update');
Route::delete('/karyawan/{id}', 'Api\KaryawanController@destroy');

});

//Obat
Route::get('/obat','Api\ObatController@index');
Route::post('/obat', 'Api\ObatController@store');
Route::get('/obat/{id}','Api\ObatController@show');
Route::post('/obat/{id}', 'Api\ObatController@update');
Route::delete('/obat/{id}', 'Api\ObatController@destroy');

//Pembeli
Route::get('/pembeli','Api\PembeliController@index');
Route::post('/pembeli', 'Api\PembeliController@store');
Route::get('/pembeli/{id}','Api\PembeliController@show');
Route::post('/pembeli/{id}', 'Api\PembeliController@update');
Route::delete('/pembeli/{id}', 'Api\PembeliController@destroy');

//Stok
Route::get('/stok','Api\StokController@index');
Route::post('/stok', 'Api\StokController@store');
Route::get('/stok/{id}','Api\StokController@show');
Route::post('/stok/{id}', 'Api\StokController@update');
Route::delete('/stok/{id}', 'Api\StokController@destroy');

//Register
Route::post('/register','Api\AuthController@register');

//Login
Route::post('/login','Api\AuthController@login');
