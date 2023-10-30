<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class EmployeeMiddleware
{
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            if (Auth::User()->is_role == '0') {
                return $next($request);
            } else {
                Auth::logout();
                return redirect(url('/'));
            }
        }
    }
}
