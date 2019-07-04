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
    return view('landing');

});
Route::get('hasil','VoteController@hasil');
Route::view('about','about');
Route::resource('vote','VoteController');


Auth::routes();

Route::get('/admin', 'HomeController@index')->name('home');
Route::resource('/admin/peserta', 'PesertaController',['as'=>'admin']);
Route::resource('/admin/formatur', 'FormaturController',['as'=>'admin']);
Route::get('swal/{type}', 'HomeController@myNotification');