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

Route::get('/home', 'HomeController@index');
Route::get('/', 'GuestController@index')->name('home');
Route::get('/dashboard', 'HomeController@index')->name('dashboard');
Route::get('/usage', 'GuestController@usage')->name('usage');


Route::get('/request', 'HomeController@request')->name('request');
Route::get('/shoppingcart', 'HomeController@shop')->name('shoppingcart');
Route::get('/catalog', 'HomeController@catalog')->name('catalog');
