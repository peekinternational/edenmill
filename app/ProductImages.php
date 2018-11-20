<?php

namespace Edenmill;

use Illuminate\Database\Eloquent\Model;

class ProductImages extends Model
{
    protected  $table = 'product_images';
    protected  $fillable = ['product_id','image','main'];
    public function product (){
            return $this->belongsTo(\Edenmill\Products::class);
    }
}
