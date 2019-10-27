<?php

use Illuminate\Support\Facades\Route;


Route::group(['middleware' => 'auth:api'], function() {

    Route::get('/', 'UserController@index');
    Route::post('/', 'UserController@store');
    Route::get('/{id}', 'UserController@show');
    Route::match(['put', 'patch'], '/{id}', 'UserController@update');
	Route::delete('/{id}', 'UserController@delete');

});