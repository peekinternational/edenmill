<?php

namespace Edenmill;

use Illuminate\Database\Eloquent\Model;

class SubNavs extends Model
{
    protected $table = 'sub_navs';

        protected $fillable = ['title','nav_id','url','slug','order_by','page_id','hidden'];
        protected $dates = ['created_at','updated_at'];

        public function nav(){
                return $this->hasOne(Navs::class,'id','nav_id');
        }
        public function page(){
             return $this->belongsTo(Pages::class,'page_id','id');
        }

        public function products(){
                return $this->belongsToMany(Products::class,'product_navs','nav_id','product_id');

        }
}
