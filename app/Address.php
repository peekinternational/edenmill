<?php

namespace Edenmill;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table='address';
     protected $fillable = ['user_id','country','city','post_code','address','state','address_type'];
     protected $dates = ['created_at','update_at'];

      public function user(){
                $this->hasOne(User::class,'user_id','id');
      }


}
