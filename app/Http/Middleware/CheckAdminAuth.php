<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckAdminAuth
{
    public function handle(Request $request, Closure $next)
    {
        // Verificar si hay sesión de admin activa
        if (!session('admin_authenticated')) {
            return redirect('/admin/login');
        }

        return $next($request);
    }
}
