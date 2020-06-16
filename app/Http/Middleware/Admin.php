<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
class Admin
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
        $user = Auth::user();
        if($user->roles->first()){
            foreach($user->roles as $role){
                if($role->nom == "Président" || $role->nom == "Super Admin" || $role->nom == "Administrateur" || $role->nom == "Vice-président" ){
                    return $next($request);
                }
                return redirect('membre');
            }
        } return redirect('membre');
    }
}
