<?php

namespace Edenmill\Providers;

use Edenmill\Category;
use Edenmill\Navs;
use Edenmill\ShopCategories;
use Illuminate\Support\ServiceProvider;
use LukePOLO\LaraCart\LaraCart;
use phpDocumentor\Reflection\Types\Null_;
use Edenmill\Orders;
use Edenmill\GiftOrders;
//use LukePOLO\LaraCart\LaraCart;
class NavBarProvider extends ServiceProvider
{
	
	
	/**
	* Bootstrap the application services.
		     *
		     * @return void
		     */
		    protected  $cartItems = null;
	public function boot()
		    {
		$this->get_navs();
		$this->categories();
        $this->orderCount();
        $this->giftsOrderCount();
		// 		$this->get_cartItems();
	}
	
	
	
	/**
	* Register the application services.
		     *
		     * @return void
		     */
		    public function register()
		    {
		//
		
		
		/*   $this->app->bind('LukePOLO\LaraCart\LaraCart', function ($app) {
		return LaraCart($app->make('LaraCart'));
	}
	);
	*/
}



protected function get_navs(){
	view()->composer('*',function($view){
		$view->with('navs',Navs::orderBy('order_by')->get());
	}
	);
}
protected function categories(){
	view()->composer('*',function($view){
		$view->with('ProductCategories',Category::all());
	}
	);
}
protected function get_cartItems(){
	
	view()->composer('*',function($view){
		$view->with('cart',LaraCart::getInstances());
	}
	);
}

public function giftsOrderCount(){
	view()->composer('dashboard.partials.left_sidebar',function($view){
		$view->with('GiftOrderCount', GiftOrders::whereRead(0)->count());
	}
	);
}
public function orderCount(){
	view()->composer('dashboard.partials.left_sidebar',function($view){
		$view->with('OrderCount', Orders::whereRead(0)->count());
	}
	);
}

}
