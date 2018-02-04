<?php

use \Illuminate\Support\Facades\Redirect;

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
    return Redirect::to('customers');
});

Route::get('customers', 'CustomerController@index')->name('customers');
Route::get('customers/create', 'CustomerController@createCustomer')->name('createCustomer');
Route::get('customers/edit/{id}', 'CustomerController@editCustomer')->name('editCustomer');
Route::post('customers/submit', 'CustomerController@submitCustomer')->name('submitCustomer');