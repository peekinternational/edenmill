<?php

namespace Edenmill;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
        protected $table ='slider';
        protected $fillable = ['background','title','description','link','link_text','order_by','text_align'];

        protected $dates = ['created_at','updated_at'];
}
