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

// Route::get('/', function () {
//     return view('store');
// });

Route::get('/', 'App\Http\Controllers\PageController@home')->name('home');
Route::get('/contact', 'App\Http\Controllers\PageController@contact')->name('contact');
Route::get('/checkout/infomation', 'App\Http\Controllers\CheckoutController@infomation')->name('infomation');
Route::post('checkout/shipping', 'App\Http\Controllers\CheckoutController@postInfomation')->name('postInfomation');
Route::get('/checkout/shipping', 'App\Http\Controllers\CheckoutController@shipping')->name('shipping');
Route::post('checkout/payment', 'App\Http\Controllers\CheckoutController@postShipping')->name('postShipping');
Route::get('/checkout/payment', 'App\Http\Controllers\CheckoutController@payment')->name('payment');
// Route::post('/checkout/payment', 'App\Http\Controllers\CheckoutController@payment')->name('postPayment');
Route::get('/store', 'App\Http\Controllers\ProductController@index')->name('store');
Route::get('/store/show/{id}', 'App\Http\Controllers\ProductController@show')->name('product.show');
Route::get('/cart', 'App\Http\Controllers\CartController@index')->name('cart.index');
Route::post('/cart/create', 'App\Http\Controllers\CartController@create')->name('cart.create');
Route::post('/cart/update', 'App\Http\Controllers\CartController@update')->name('cart.update');
Route::get('/cart/delete/{id}', 'App\Http\Controllers\CartController@destroy')->name('cart.delete');
