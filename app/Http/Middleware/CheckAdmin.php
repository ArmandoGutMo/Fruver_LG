<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckAdmin
{
    public function handle(Request $request, Closure $next)
    {

        // Verificar si el usuario está autenticado y si tiene el rol 'admin'
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            // Si no está autenticado o no es administrador, redirigir al login
            return redirect()->route('productos.index');  // O usa otra ruta de tu preferencia
        }

        return $next($request);  // Permitir el acceso si es administrador
    }
}
