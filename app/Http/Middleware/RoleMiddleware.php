<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;  // Pastikan ini di-import

class RoleMiddleware
{
    public function handle($request, Closure $next, $role)
{
    if (!Auth::check()) {
        abort(403, 'Not logged in');
    }

    $userRole = Auth::user()->role->name_role ?? 'undefined';

    if ($userRole !== $role) {
        abort(403, "ACCESS DENIED: YOU ARE NOT $role (You are $userRole)");
    }

    return $next($request);
}
}