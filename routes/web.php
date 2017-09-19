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

Route::get('/', 'CategoryController@home');

//Dashboard
Route::get('/dashboard','DashboardController@get');

//Quotes
Route::resource('quotes','QuotesController');
Route::get('/quotes/contact/{quoteId}', 'QuotesController@contact');
Route::get('/quotes/transform/{quoteId}', 'QuotesController@transform');

//Bookings
Route::resource('bookings', 'BookingController');

//Clients
Route::resource('clients', 'ClientController');
Route::get('clients/archive/{clientId}', 'ClientController@archive');

//Products
Route::resource('products', 'ProductsController');
Route::get('/products/{productId}/archive', 'ProductsController@archive');

//Category
Route::resource('categories', 'CategoryController');