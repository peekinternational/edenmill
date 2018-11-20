<?php

namespace Edenmill;

use Illuminate\Database\Eloquent\Model;
use Zizaco\Entrust\EntrustPermission;
class Permission extends EntrustPermission
{
        public function roles()
        {
                return $this->belongsToMany(Role::class);
        }

        public function user_count($permissions_id){
                $permission = Permission::findOrFail($permissions_id);
                $roles = $permission->roles->pluck('id');
                $user = User::join('role_user', function ($join) {
                        $join->on('users.id', '=', 'role_user.user_id');
                })->whereIn('role_id',$roles)->get();
                return $user->count();
        }

        public function users($permissions_id){
                $permission = Permission::findOrFail($permissions_id);
                $roles = $permission->roles->pluck('id');
                $user = User::join('role_user', function ($join) {
                        $join->on('users.id', '=', 'role_user.user_id');
                })->whereIn('role_id',$roles)->get();
                return $user;
        }
}
