<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckEdad
{
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->edad < 18) {
            return response()->json(['mensaje' => 'Acceso denegado. Debes ser mayor de edad.'], 403);
        }

        return $next($request); // Permite continuar la petición
    }
}