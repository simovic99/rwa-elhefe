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

Route::get('naruci','ProductsController@index2')->name('shop.index');
Route::get('korisnici','KorisniciController@index');
Route::get('edit/{id}','KorisniciController@show');
Route::post('edit/{id}','KorisniciController@edit');
Route::get('delete/{id}','KorisniciController@destroy');
Route::get('cijene','ProductsController@index');
Route::post('cijene','ProductsController@edit');
Route::get('create','ProductsController@index3');
Route::get('about','ConfirmationController@about');
Route::post('create','ProductsController@create');
//
Route::get('/cart', 'CartController@index')->name('cart.index');
Route::post('/cart/{product}', 'CartController@store')->name('cart.store');
Route::patch('/cart/{product}', 'CartController@update')->name('cart.update');
Route::delete('/cart/{product}', 'CartController@destroy')->name('cart.destroy');
Route::post('/cart/switchToSaveForLater/{product}', 'CartController@switchToSaveForLater')->name('cart.switchToSaveForLater');

Route::get('/checkout', 'CheckoutController@index')->name('checkout.index')->middleware('auth');
Route::post('/checkout', 'CheckoutController@store')->name('checkout.store');
Route::get('/thankyou', 'ConfirmationController@index')->name('confirmation.index');
Route::middleware('auth')->group(function () {

    Route::get('/my-orders', 'OrdersController@index')->name('orders.index');
    Route::get('/my-orders/{order}', 'OrdersController@show')->name('orders.show');
});

//URL::forceRootUrl('http://studenti.sum.ba/projekti/fsre/2019/g7');

