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

/*Route::get('/', function () {
    return view('welcome');
});*/

Auth::routes();

Route::get('/', 'GuestController@index')->name('home');
Route::get('/usage', 'GuestController@usage')->name('usage');


Route::get('/home', 'HomeController@index');
Route::get('/dashboard', 'HomeController@index')->name('dashboard');
Route::post('/dashboard', 'HomeController@addItem')->name('dashboard');
Route::get('/request', 'HomeController@request')->name('request');
Route::get('/shoppingcart', 'HomeController@shop')->name('shoppingcart');

Route::get('/bio', 'HomeController@bio')->name('bio');

