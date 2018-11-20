<?php

namespace Edenmill\Http\Middleware;

use Closure;
use \Auth;
class DashboardLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            $roles = Auth::user()->roles;
            $redirect = true;
            foreach($roles as $role){
                if($role->name == 'admin'){
                    $redirect = false;
                }
            }
            if($redirect){
                return redirect('/');
            }
        }
        return $next($request);
    }
}
