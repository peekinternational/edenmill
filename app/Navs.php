<?php

namespace Edenmill;

use Illuminate\Database\Eloquent\Model;

class Navs extends Model
{
        protected $table ='navs';

        protected $fillable = ['title','slug','page_id','color','hover_color','order_by','hidden'];
        protected $dates = ['created_at','updated_at'];

        public function sub_navs(){
                return $this->hasMany(SubNavs::class,'nav_id','id');
        }
        public function page(){
                return $this->hasOne(Pages::class,'id','page_id');
        }
}
