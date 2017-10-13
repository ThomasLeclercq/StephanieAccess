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

Route::get('/', 'HomeController@index');
Route::get('/admin', function(){
	return redirect('/login');
});
Route::get('/addUser', function(){
	return redirect('/register');
});

//Dashboard
Route::get('/dashboard','DashboardController@get');

//Availabilities
Route::resource('availabilities', 'AvailabilityController');

//Quotes
Route::resource('quotes','QuotesController');
Route::get('/quotes/contact/{quoteId}', 'QuotesController@contact');
Route::get('/quotes/transform/{quoteId}', 'QuotesController@transform');

//Bookings
Route::resource('bookings', 'BookingController');
Route::get('/pastBookings', 'BookingController@pastBookings');

//Clients
Route::resource('clients', 'ClientController');
Route::get('clients/archive/{clientId}', 'ClientController@archive');

//Products
Route::resource('products', 'ProductsController');
Route::get('/products/{productId}/archive', 'ProductsController@archive');

//Category
Route::resource('categories', 'CategoryController');
Auth::routes();

//Users
Route::resource('users','UserController');
Route::get('/users/{user}/archive', 'UserController@destroy');

Route::get('/home', 'HomeController@index')->name('home');
