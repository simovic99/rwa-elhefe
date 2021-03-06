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
})->name('welcome');
Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

//Route::middleware('auth', 'admin')->get('/home', 'HomeController@index')->name('home');

Route::get('naruci','ProductsController@index2')->name('shop.index');
Route::get('korisnici','KorisniciController@index')->name('korisnici');
Route::get('edit/{id}','KorisniciController@show');
Route::post('edit/{id}','KorisniciController@edit');
Route::get('delete/{id}','KorisniciController@destroy');
Route::get('cijene','ProductsController@index')->name('cijene');
Route::post('cijene','ProductsController@edit');
Route::get('create','ProductsController@index3');
Route::get('about','ConfirmationController@about');
Route::post('create','ProductsController@store')->name('spremi');
Route::delete('create','ProductsController@destroy')->name('izbrisi');
//
Route::get('/cart', 'CartController@index')->name('cart.index');
Route::post('/cart/{product}', 'CartController@store')->name('cart.store');
Route::get('/cart/{product}', 'CartController@update')->name('cart.update');
Route::delete('/cart/{product}', 'CartController@destroy')->name('cart.destroy');
Route::post('/cart/switchToSaveForLater/{product}', 'CartController@switchToSaveForLater')->name('cart.switchToSaveForLater');

Route::get('/checkout', 'CheckoutController@index')->name('checkout.index')->middleware('auth');
Route::post('/checkout', 'CheckoutController@store')->name('checkout.store');
Route::get('/checkout/{product}', 'CheckoutController@update')->name('checkout.update');
Route::get('/thankyou', 'ConfirmationController@index')->name('confirmation.index');
Route::middleware('auth')->group(function () {

    Route::get('/my-orders', 'OrdersController@index')->name('orders.index');
    Route::get('/my-order/{order}', 'OrdersController@show')->name('orders.show');
});
Route::get('/all-orders', 'OrdersController@admin')->name('all-orders');
Route::post('/all-orders', 'OrdersController@potvrda')->name('all-orders-potvrda');
Route::get('/all-order/{order}', 'OrdersController@adminshow')->name('all-orders.show');
//URL::forceRootUrl('http://studenti.sum.ba/projekti/fsre/2019/g7');

