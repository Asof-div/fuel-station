<?php

use Illuminate\Support\Facades\Route;


Route::group(['middleware' => 'auth:api'], function() {

    Route::get('/', 'FuelController@index');
    Route::post('/', 'FuelController@store');
    Route::get('/{id}', 'FuelController@show');
    Route::match(['put', 'patch'], '/{id}', 'FuelController@update');
	Route::delete('/{id}', 'FuelController@delete');

});