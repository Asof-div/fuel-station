<?php

use Illuminate\Support\Facades\Route;


Route::group(['middleware' => 'auth:api'], function() {

    Route::get('/', 'FuelController@index');
    Route::post('/delivery', 'FuelController@fuelDelivery');
    Route::post('/dispense', 'FuelController@fuelDispenser');
    Route::get('/{id}', 'FuelController@show');

});