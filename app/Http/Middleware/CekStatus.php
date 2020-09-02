<?php

namespace App\Http\Middleware;

use Closure;

class CekStatus
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
        $user = \App\User::where('email', $request->email)->first();
        if ($user->role == 1) {
            return redirect('admin/dashboard');
        } elseif ($user->status == 2) {
            return redirect('member/dashboard');
        }
        return $next($request);
    }
}
