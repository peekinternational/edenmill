<?php

namespace Edenmill;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $dates = ['created_at','updated_at'];
    protected $fillable = ['name','meta_title','meta_keywords','meta_description'];

    public function products(){
            return $this->hasMany(Products::class,'id','product_id');
    }
}
