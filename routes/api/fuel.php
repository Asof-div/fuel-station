<?php

use Illuminate\Support\Facades\Route;


Route::group(['middleware' => 'auth:api'], function() {

    Route::get('/', 'FuelController@index');
    Route::get('/delivery-template', 'FuelController@deliveryTemplate');
    Route::get('/dispenser-template', 'FuelController@dispenserTemplate');
    Route::post('/delivery-upload', 'FuelController@uploadDelivery');
    Route::post('/dispense-upload', 'FuelController@uploadDispense');
    Route::post('/delivery', 'FuelController@fuelDelivery');
    Route::post('/dispense', 'FuelController@fuelDispenser');
    Route::get('/{id}', 'FuelController@show');

});