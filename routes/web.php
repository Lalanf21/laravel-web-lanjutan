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

Route::get('mahasiswa', 'MahasiswaController@index')->name('mahasiswa');
Route::get('add-mahasiswa', 'MahasiswaController@create')->name('add-mahasiswa');
Route::get('/mahasiswa/list', 'MahasiswaController@mhs_list')->name('list-mahasiswa');
Route::post('/mahasiswa/store', 'MahasiswaController@store')->name('store-mahasiswa');
Route::get('/mahasiswa/edit/{nim}', 'MahasiswaController@edit')->name('edit-mahasiswa');
Route::put('/mahasiswa/update/{mahasiswa:nim}', 'MahasiswaController@update')->name('update-mahasiswa');
Route::get('/mahasiswa/delete/{mahasiswa:nim}', 'MahasiswaController@destroy')->name('delete-mahasiswa');


Route::get('/dosen/delete/{dosen}', 'DosenController@destroy');
Route::get('/dosen/list', 'DosenController@dosen_list')->name('list-dosen');
Route::resource('dosen', 'DosenController');