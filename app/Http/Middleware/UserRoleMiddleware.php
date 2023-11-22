<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserRoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $role)
    {
        if (Auth::check()) {
            // Check if the user's role matches the given role or if the role is not set
            if (Auth::user()->role == $role || is_null(Auth::user()->role) || Auth::user()->role == 0) {
                return $next($request);
            }
            if (Auth::check() && Auth::user()->role == 1) {
                return redirect()->route('admin.index');// Redirect admin to admin.home
            } else {
                return redirect('/'); // Redirect others to the welcome page
            }
        }
        else{
            return redirect('/');
        }
        
    }

}
