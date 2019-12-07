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
Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();
//Route::middleware('auth', 'admin')->get('/home', 'HomeController@index')->name('home');

Route::get('naruci','ProductsController@index');
Route::get('korisnici','KorisniciController@index');
Route::get('edit/{id}','KorisniciController@show');
Route::post('edit/{id}','KorisniciController@edit');
Route::get('delete/{id}','KorisniciController@destroy');
Route::get('promjeni','ProductsController@edit');
Route::get('cijene','uredi@index');
Route::post('uredi1','uredi@update');
