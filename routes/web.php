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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/events', 'HomeController@events')->name('events');
Route::get('/hackathon', 'HomeController@hackathon')->name('hackathon');
Route::get('/training', 'HomeController@training')->name('training');
Route::post('/created', 'HomeController@created')->name('created');
Route::post('/posted', 'HomeController@addToCart')->name('add_to_cart');
Route::get('/create', 'HomeController@create')->name('create');
Route::get('/admin/view/events', 'HomeController@viewEvents')->name('viewEvents');
Route::get('/admin/view/users', 'HomeController@viewUsers')->name('viewUsers');
Route::get('/book/{event_id}', 'HomeController@eventDetails')->name('eventDetails');
Route::get('/cart', 'HomeController@viewCart')->name('viewCart');
Route::get('/checkout', 'HomeController@cartCheckout')->name('cartCheckout');
Route::post('/user/permission', 'HomeController@changeUserPermissions')->name('changeUserPermissions');
Route::post('/event/info', 'HomeController@changeEventInfo')->name('changeEventInfo');
Route::post('/cart/remove', 'HomeController@removeFromCart')->name('removeFromCart');
Route::get('/report', 'HomeController@report')->name('report');