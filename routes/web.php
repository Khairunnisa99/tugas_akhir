<?php

use App\Http\Controllers\KlinikController;
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
    return redirect()->route('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
// Route::resource('dokumen','DokumenController');
//Route::resource('klinik','KlinikController');
//Dokumen
// Route::get('/dokumen', 'DokumenController@index')->name('dokumen.index');



Route::group(['middleware' => 'auth'], function () {

    Route::resource('dokumen', 'DokumenController');
    // Route::get('get/{filename}', 'DokumenController@getFile')->name('getfile');
    // Route::get('dokumen/pdf-document/{id}', 'DokumenController@getDocument');
    //Route::get('dokumen','DokumenController@search');
    //     Route::get('/dokumen', 'DokumenController@index')->name('dokumen.index');
    //     Route::get('/dokumen/create', 'DokumenController@create');
    // Route::get('/dokumen/edit/{dokumen}', 'DokumenController@edit');
    // Route::patch('/dokumen/{dokumen}', 'DokumenController@update')->name('dokumen.update');
    // Route::delete('/dokumen/{dokumen}','DokumenController@destroy');

    //Rapat
    Route::resource('rapat', 'RapatController');
    Route::get('/searchsatu', 'RapatController@searchsatu');
    Route::get('/print_all', 'RapatController@print_all');
    // Route::get('/rapat', 'RapatController@index')->name('rapat.index');
    // Route::get('/rapat/create', 'RapatController@create');

    //Klinik
    Route::resource('klinik', 'KlinikController');
    Route::get('/search', 'KlinikController@search');
    // Route::get('/klinik/{id}','KlinikController@show');
    // Route::get('/klinik', 'KlinikController@index')->name('klinik.index');
    // Route::get('/klinik/create', 'KlinikController@create');
    // Route::get('/klinik/edit/{klinik}', 'KlinikController@edit');
    // Route::patch('/klinik/{klinik}', 'KlinikController@update')->name('klinik.update');

    //Bab
    Route::resource('/bab', 'Admin\BabController');

    //Babsatu

    Route::resource('/bab_satu', 'Admin\SubSubBabController');
    // Route::resource('/bab_satu', 'BabsatuController');
    // Route::get('/babsatu', 'BabsatuController@index')->name('babsatu.index');
    // Route::get('/babsatu/create', 'BabsatuController@create');

    //Babdua
    Route::resource('/bab_dua', 'Admin\SubBabDuaController');
    // Route::get('/babdua', 'BabduaController@index')->name('babdua.index');
    // Route::get('/babdua/create', 'BabduaController@create');

    //Babtiga
    Route::resource('/bab_tiga', 'Admin\SubBabTigaController');
    // Route::get('/babtiga', 'BabtigaController@index')->name('babtiga.index');
    // Route::get('/babtiga/create', 'BabtigaController@create');

    //Babempat
    Route::resource('/bab_empat', 'Admin\SubBabEmpatController');
    // Route::get('/babempat', 'BabempatController@index')->name('babempat.index');
    // Route::get('/babempat/create', 'BabempatController@create');


    //standar
    Route::resource('/standar', 'Admin\SubBabController');

    //PK
    Route::resource('/programkerja', 'ProgramkerjaController');
    //Route::get('/programkerja/create', 'ProgramkerjaController@create');

    //Periode
    Route::resource('/periodeprogramkerja', 'PeriodeprogramkerjaController');

    //TPK
    Route::resource('/tipeprogramkerja', 'TipeprogramkerjaController');

    //SPK
    Route::resource('/statusprogramkerja', 'StatusprogramkerjaController');

    //TPelaksanaan
    Route::resource('/tipepelaksanaan', 'TipepelaksanaanController');

    //SPN
    Route::resource('/statuspelaksanaan', 'StatuspelaksanaanController');

    //Kriteria
    //Route::resource('/babdua', 'Admin\SubBabDuaController');
    Route::resource('/kriteria', 'KriteriaController');

    //elemen
    Route::resource('/elemen', 'ElemenController');

    // user
    Route::resource('/user', 'Admin\UserController');

    //pelaksanaan program
    Route::resource('/pelaksanaanprogram', 'PelaksanaanprogramController');

    //periodeakreditasi
    Route::resource('/periodeakreditasi', 'PeriodeakreditasiController');
});
