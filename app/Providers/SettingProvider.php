<?php

namespace Edenmill\Providers;

use Edenmill\Regions;
use Edenmill\Settings;
use Illuminate\Support\ServiceProvider;
use Lykegenes\LaravelCountries\Facades\Countries as Countries;
class SettingProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->site();
        $this->theme();
        $this->map();
        //$this->countries();
        $this->about_section();
        $this->slider();
        $this->payment();
        $this->gallery_categories();
        $this->menu();
        $this->recipes();
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


    public function site(){
        view()->composer('*',function($view){
            $view->with('site',Settings::site());
        });
    }

    public function theme(){
        view()->composer('*',function($view){
            $view->with('theme',Settings::theme());
        });
    }

    public function map(){
        view()->composer('*',function($view){
            $view->with('map',Settings::map());
        });
    }
    public function about_section(){
        view()->composer('index',function($view){
            $view->with('about_section',Settings::about());
        });
    }

    public function countries(){
        view()->composer('auth.register',function($view){
            $view->with('countries', Countries::getListForDropdown('cca3', false, 'eng'));
        });
    }

    public function slider(){
        view()->composer('*',function($view){
            $view->with('SliderSettings', Settings::slider());
        });
    }

    public function payment(){
        view()->composer('*',function($view){
            $view->with('PaymentSettings', Settings::payment());
        });
    }
    public function menu(){
        view()->composer('*',function($view){
            $view->with('Menu', Settings::whereGroup('menu')->firstOrNew(array('type'=>'downloadable','group'=>'menu')));
        });
    }
    public function recipes(){
        view()->composer('*',function($view){
            $view->with('Recipes', Settings::whereGroup('recipes')->firstOrNew(array('type'=>'downloadable','group'=>'recipes')));
        });
    }
    public function gallery_categories(){
        view()->composer('*',function($view){
            $view->with('GalleryCategory', Settings::galleryCategories());
        });
    }
   


}
