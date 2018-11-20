<?php

namespace Edenmill;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $table = 'gallery';
    protected $dates = ['created_at','updated_at'];
    protected $fillable = ['image','title','description','downloadable','categories','link'];
}
