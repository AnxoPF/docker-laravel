<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class ClienteMiddleware
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->esCliente()) {
            return $next($request);
        }

        abort(403, 'Acceso no autorizado.');
    }
}
