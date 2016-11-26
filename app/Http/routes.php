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

// simulate flight delayed
Route::post('/delay-flight', function () {
    $customers = \App\Customer::all();
    \App\Services\ContactService::sendCustomerAppLink($customers, true, true);
    return "<h1>flight delayed</h1>";
});

// API
Route::group(['prefix' => 'api'], function () {
    Route::resource('customers', 'CustomerController', ['only' => ['show', 'update']]);
});

