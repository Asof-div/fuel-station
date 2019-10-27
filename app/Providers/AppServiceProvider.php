<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;
use Laravel\Passport\Passport;
use Hash;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('validpassword', function ($attribute, $value, $parameters, $validator) {
            
            if(!Hash::check($value, $parameters[0]) ){
                return false;
            }

            return true;

        });

        Validator::replacer('validpassword', function($message, $attribute, $rule, $parameters) {
            return str_replace(':attribute',$attribute, ':attribute is invalid');
        });

        Passport::tokensExpireIn(now()->addDays(15));
    }
}
