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
    return view('login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
// Route::resource('dokumen','DokumenController');
//Route::resource('klinik','KlinikController');
//Dokumen
// Route::get('/dokumen', 'DokumenController@index')->name('dokumen.index');



Route::group(['middleware' => 'auth'], function () {
    Route::get('/dokumen', 'DokumenController@index')->name('dokumen.index');
    Route::get('/dokumen/create', 'DokumenController@create');
Route::get('/dokumen/edit/{dokumen}', 'DokumenController@edit');
Route::patch('/dokumen/{dokumen}', 'DokumenController@update')->name('dokumen.update');
Route::delete('/dokumen/{dokumen}','DokumenController@destroy');
 
//Rapat
Route::resource('rapat','RapatController');
Route::get('/rapat', 'RapatController@index')->name('rapat.index');
Route::get('/rapat/create', 'RapatController@create');

//Klinik
Route::resource('klinik','KlinikController');
Route::get('/klinik', 'KlinikController@index')->name('klinik.index');
Route::get('/klinik/create', 'KlinikController@create');
Route::get('/klinik/edit/{klinik}', 'KlinikController@edit');
Route::patch('/klinik/{klinik}', 'KlinikController@update')->name('klinik.update');

//Bab
Route::get('/bab', 'BabController@index')->name('bab.index');

//Babsatu
Route::get('/babsatu', 'BabsatuController@index')->name('babsatu.index');
Route::get('/babsatu/create', 'BabsatuController@create');

//Babdua
Route::get('/babdua', 'BabduaController@index')->name('babdua.index');
Route::get('/babdua/create', 'BabduaController@create');

//Babtiga
Route::get('/babtiga','BabtigaController@index')->name('babtiga.index');
Route::get('/babtiga/create', 'BabtigaController@create');

//Babempat
Route::get('/babempat', 'BabempatController@index')->name('babempat.index');
Route::get('/babempat/create', 'BabempatController@create');

//PK
Route::get('/programkerja', 'ProgramkerjaController@index')->name('programkerja.index');
Route::get('/programkerja/create', 'ProgramkerjaController@create');

});





