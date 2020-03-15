<?php

namespace App\Http\Middleware;

use App\User;
use Closure;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $roleName)
    {
        $user = new User();
        $roleId = $user['roles_id'];
        if(!$user->hasRole($roleName, 2)){
            return redirect()->to('/');
        }
        return $next($request);
    }
}
