<?php

use Illuminate\Support\Facades\Route;


Route::group(['middleware' => 'auth:api'], function() {

    Route::get('/', 'TankController@index');
    Route::post('/', 'TankController@store');
    Route::get('/{id}', 'TankController@show');
    Route::get('/report/{id}', 'TankController@tankSummary');
    Route::match(['put', 'patch'], '/{id}', 'TankController@update');
	Route::delete('/{id}', 'TankController@delete');

});