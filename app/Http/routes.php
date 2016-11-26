<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

// API
Route::group(['prefix' => 'api'], function () {
    Route::resource('customers', 'CustomerController', ['only' => ['show', 'update']]);
});

// Test sendCustomerAppLink
Route::get('/send-customer-app-link', function () {
    $customers = \App\Customer::all();
    return \App\Services\ContactService::sendCustomerAppLink($customers, true, false);
});