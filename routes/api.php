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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/ujian', 'api\UjianController@index');
Route::get('/soal/{id}/ujian', 'api\SoalController@getSoalUjian');
Route::get('/soal_essay/{id}/ujian', 'api\SoalEssayController@getSoalEssayUjian');
Route::get('/ujian/{id}/kejuruan', 'api\UjianController@getUjianKejuruan');
Route::get('/pilihan/{id}/soal', 'api\PilihanController@getPilihanSoal');
Route::get('/siswa/{id}/pilihan', 'api\SiswaController@getSiswaPilihan');
Route::get('/siswa', 'api\SiswaController@index');

//Route::post('/ujian', 'api\UjianController@store');
Route::post('/ujian/siswa', 'api\UjianController@postUjianSiswa');
Route::post('/soal_essay/siswa', 'api\SoalEssayController@postJawabanEssaySiswa');
Route::resource('/jawaban', 'api\JawabanController');
