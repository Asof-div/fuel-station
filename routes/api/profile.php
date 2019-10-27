<?php

use Illuminate\Support\Facades\Route;


Route::group(['middleware' => 'auth:api'], function() {

    Route::get('/', 'ProfileController@index');
    Route::match(['put', 'patch'], '/update', 'ProfileController@update');
    Route::match(['put', 'patch'], 'change-password', 'ProfileController@changePassword');

});