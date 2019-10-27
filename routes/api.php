<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::group(['namespace' => 'API', ], function () {


    Route::group(['prefix' => 'auth', 'namespace' => 'Auth'], function () {
        Route::post('login', 'AuthController@login');

        Route::group(['middleware' => 'auth:api'], function () {
            Route::put('password', 'AuthController@changePassword');
            Route::delete('logout', 'AuthController@logout');
            Route::get('user', 'AuthController@user');
        });

    });

    Route::group(['prefix' => 'app'], function () {

	    Route::prefix('dispenser')->group(base_path('routes/api/dispenser.php'));
	    
	    Route::prefix('fuel')->group(base_path('routes/api/fuel.php'));
	    
	    Route::prefix('profile')->group(base_path('routes/api/profile.php'));
	    
	    Route::prefix('tank')->group(base_path('routes/api/tank.php'));

	    Route::prefix('user')->group(base_path('routes/api/user.php'));


    });


    Route::fallback('NotFoundController@index');
    Route::any('(:any)', 'NotFoundController@index');
});