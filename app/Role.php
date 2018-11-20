<?php

namespace Edenmill;

use Illuminate\Database\Eloquent\Model;
use Zizaco\Entrust\EntrustRole;
class Role extends  EntrustRole
{
        protected $fillable = ['name','display_name','description'];

        public function users()
        {
                return  $this->belongsToMany(User::class);
        }
        public function permissions()
        {
                return  $this->belongsToMany(Permission::class);
        }
}
