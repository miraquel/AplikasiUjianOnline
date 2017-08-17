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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::group(['middleware' => ['instruktur', 'auth']], function()
{
    Route::resource('/agama', 'AgamaController');
    Route::resource('/pekerjaan', 'PekerjaanController');
    Route::resource('/pendidikan', 'PendidikanController');
    Route::resource('/kejuruan', 'KejuruanController');
    Route::resource('/informasi', 'InformasiController');
    Route::resource('/status', 'StatusController');
    Route::resource('/siswa', 'SiswaController');
    Route::get('/ujian/{ujian}/soal_pg/', 'UjianController@editSoal');
    Route::get('/ujian/{ujian}/jawaban/', 'UjianController@evaluasiJawaban');
    Route::get('/siswa/{essay}/essay/{ujian}/ujian', 'UjianController@evaluasiEssay');
    Route::get('/print/{ujian}/ujian', 'PrintController@print');
    Route::resource('/ujian', 'UjianController');
    Route::resource('/soal', 'SoalController');
    Route::resource('/soal_essay', 'SoalEssayController');
    Route::resource('/jawaban', 'JawabanController');
    Route::resource('/pilihan', 'PilihanController');
});

Route::group(['middleware' => ['admin', 'auth']], function()
{
    Route::resource('/user', 'UserController');
    Route::resource('/role', 'RoleController');
});

Route::get('/apps/ujian', 'AppsController@index');
