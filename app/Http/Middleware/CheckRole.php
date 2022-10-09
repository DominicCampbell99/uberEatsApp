<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */

    ///checks the type of role of the user, if the user is not the required role will abort the request and 
    ///return them to the login page
    public function handle(Request $request, Closure $next, string $role)
    {
        if ($role == 'admin' && Auth::user()->role != 'admin' ) {
            abort(403);
        }
        if ($role == 'restaurant' && Auth::user()->role != 'restaurant' ) {
            abort(403);
        }
        if ($role == 'customer' && Auth::user()->role != 'customer' ) {
            abort(403);
        }
        return $next($request);
    }
}
