<?php

namespace Edenmill\Providers;

use Illuminate\Support\ServiceProvider;
use Edenmill\Products;
class ProductProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->latestProducts();
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    protected function latestProducts(){
        view()->composer('*',function($view){
            $view->with('latestProducts',Products::latest()->get());
        });
    }
}
