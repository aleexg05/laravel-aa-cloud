<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Administrador
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check() && auth()->user()->email === 'admin@admin.es') {
            return $next($request);
        }

        abort(403, 'Accés denegat');
    }
}
