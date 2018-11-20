<?php

namespace Edenmill;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Edenmill\Products;
use Edenmill\OrderProducts;
class Orders extends Model
{
        use Notifiable;
        protected $table = 'orders';
        protected $fillable = ['payment_status','_token','payer_id','address_zip','address_street','address_name','address_country_code','address_city','payer_status','business','num_cart_items','payer_email','ipn_track_id','payment_date'];
        public $timestamps = false;

        public function order_products(){
           return   $this->hasMany(OrderProducts::class,'order_id','id');                 
        }

        public function products($id)
    {
        $this->__id = $id;
        return Products::whereExists(function ($query) {
                $query->select(\DB::raw(1))
                      ->from('orders')
                      ->where('orders.id','=',$this->__id)
                      ->join('order_products', 'order_products.order_id', '=', 'orders.id')
                      ->join('products', 'order_products.product_id', '=', 'products.id');
            });
    }

    
}
