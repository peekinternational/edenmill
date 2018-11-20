<?php

namespace Edenmill;

use Illuminate\Database\Eloquent\Model;



class Pages extends Model
{
    protected $fillable = [ 'name', 'data', 'slug','meta_title','meta_keywords','meta_description' ];

    protected $dates = ['created_at','updated_at'];
}
