<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

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
        Validator::extend('phone_number', function ($attribute, $value, $parameters, $validator) {
            return preg_match('/^((8|\+7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{10}/', $value);
        });

        Validator::replacer('phone_number', function($message, $attribute, $rule, $parameters) {
            return str_replace(':attribute', __('feedback.' .$attribute), ':attribute не верный формат номера');
        });
    }
}
