<?php

namespace Edenmill;

use Illuminate\Database\Eloquent\Model;

class OrderProducts extends Model
{
    protected $table = 'order_products';
    protected $fillable = ['order_id','product_id','quantity','price','tax'];
    public $timestamps = false;


}
