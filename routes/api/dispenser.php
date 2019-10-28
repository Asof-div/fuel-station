<?php

use Illuminate\Support\Facades\Route;


Route::group(['middleware' => 'auth:api'], function() {

    Route::get('/', 'DispenserController@index');
    Route::post('/', 'DispenserController@store');
    Route::get('/{id}', 'DispenserController@show');
    Route::get('/report/{id}', 'DispenserController@dispenserSummary');
    Route::match(['put', 'patch'], '/{id}', 'DispenserController@update');
	Route::delete('/{id}', 'DispenserController@delete');

});