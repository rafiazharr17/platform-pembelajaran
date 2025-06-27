<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        $user = Auth::user();

        // Jika belum login
        if (! $user) {
            abort(403, 'ACCESS DENIED: NOT AUTHENTICATED');
        }

        // Jika role user tidak cocok
        if (! in_array($user->role->name_role, $roles)) {
            abort(403, 'ACCESS DENIED: YOU ARE NOT ' . implode('/', $roles) . ' (You are ' . $user->role->name_role . ')');
        }

        return $next($request);
    }
}
