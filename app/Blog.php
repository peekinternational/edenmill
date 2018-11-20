<?php

namespace Edenmill;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
        protected  $table = 'blog';
        protected  $fillable = ['user_id','post','publish_at','meta_title','meta_keywords','meta_description'];
        protected $dates = ['created_at','updated_at','publish_at'];

        public function scopeLatestPublished($query,$value=20){
            return    $query->where('publish_at','<',Carbon::now())->orderBy('published_at','desc')->limit($value);
        }
        public function scopeLatestUnPublished($query,$value=20){
                return   $query->where('publish_at','>=',Carbon::now())->orderBy('published_at','desc')->limit($value);
        }

        public function scopePublished($query){
                return   $query->where('publish_at','<',Carbon::now());
        }

        public function scopeUnPublished($query){
                return   $query->where('publish_at','>=',Carbon::now());
        }
        public function user(){
                return $this->hasOne(User::class,'id','user_id');
        }
}
