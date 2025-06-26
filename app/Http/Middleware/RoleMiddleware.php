<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    // App\Http\Middleware\RoleMiddleware.php
    public function handle(Request $request, Closure $next, $role): Response
    {
        if (!$request->user() || $request->user()->role->name_role !== $role) {
            abort(403, 'Unauthorized');
        }

        return $next($request);
    }
}
