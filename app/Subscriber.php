<?php

namespace Edenmill;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Subscriber extends Model
{
        use Notifiable;
    protected $table = 'subscribers';
     protected $fillable = ['email','name','phone'];
     protected $dates = ['created_at','updated_at'];
}
