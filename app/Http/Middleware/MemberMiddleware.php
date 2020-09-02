<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class MemberMiddleware
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
        
        if(isset($user->role) && $user->role === '2') {
            return $next($request);
        }

        return redirect('login'); 
    }
}
