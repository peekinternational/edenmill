<?php

namespace Edenmill;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{

        protected $fillable = ['name','category_id','slug','price','description','meta_title','meta_keywords','meta_description'];

      /*  public function categories(){
                return $this->belongsToMany(Categories::class,'product_categories','product_id','category_id');
        }*/

        public function category(){
                return $this->hasOne(Category::class,'id','category_id');
        }
        public function images(){
                return $this->hasMany(\Edenmill\ProductImages::class,'product_id');
        }
        public function scopeLatest($query,$limit=5){
              return  $query->orderBy('created_at', 'desc')->limit((int)$limit);
        }

        public function navs(){
                return $this->belongsToMany(SubNavs::class,'product_navs','product_id','nav_id');
        }
        public function tags (){
                return $this->belongsToMany(Tags::class,'product_tags','product_id','tag_id');
        }

}
