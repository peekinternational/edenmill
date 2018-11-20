<?php

namespace Edenmill;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;
class User extends Authenticatable
{
    use Notifiable,EntrustUserTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name','last_name', 'email','password','company_name','phone','gender'
    ];

    protected   $dates = ['created_at','deleted_at'];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function address(){
        return $this->hasMany(Address::class,'user_id','id');
    }

    /**
     * Set Auto Hashing Password
     *
     * @var string $password
     */
   /* public function setPasswordAttribute($value){
        $this->attributes['password'] = bcrypt($value);
    }*/


    public function orders(){
        return $this->hasMany(\Edenmill\Orders::class);
    }

    /**
     * Get active users
     *
     * @var string $query
     */
    public function scopeActive($query){
        return $query->whereStatus(1)->whereDeleted(0);
    }

    /**
     * Get in-active users
     *
     * @var string $query
     */
    public function scopeInActive($query){
        return $query->whereStatus(0)->whereDeleted(0);
    }

    /**
     * Get deleted users
     *
     * @var string $query
     */
    public function scopeDestroyed($query){
        return $query->whereDeleted(1);
    }

   
}
