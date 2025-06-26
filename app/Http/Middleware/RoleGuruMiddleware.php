<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleGuruMiddleware
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role && Auth::user()->role->name_role === 'Guru') {
            return $next($request);
        }

        abort(403, 'Hanya Guru yang dapat mengakses halaman ini.');
    }
}