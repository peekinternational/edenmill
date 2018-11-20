<?php

namespace Edenmill\Providers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('is_image', function ($attribute, $value, $parameters, $validator) {
            //$filename = $value->getRealPath();
            //$filename = pathinfo($filename, PATHINFO_FILENAME);
            //dd(getimagesize($value->getRealPath()));
            $allowed_extensions = ['jpeg','jpg','gif','png','bmp'];
            if(in_array($value->clientExtension(),$allowed_extensions) && @is_array(getimagesize($value->getRealPath()))){
                return true;
            } else {
                return false;
            }
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
