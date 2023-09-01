<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */


    public function handle($request, Closure $next, $role)
    {
        $user = Auth::user();

        if ($user->hasRole($role)) {
            if ($role === 'admin') {
                return redirect('/admin/dashboard');
            } elseif ($role === 'user') {
                return redirect('/user/dashboard');
            }
        }

        return $next($request);
    }
}
