<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    // public function handle(Request $request, Closure $next): Response
    // {
    //     if(!Auth::check()|| !Auth::user()->hasPermission($permission)){
    //        return redirect('/');
    //     }
    //     return $next($request);
    // }

    public function handle(Request $request, Closure $next, $permission = null)
    {
        // Si no se proporcionó un permiso específico, permitir el acceso
        if (!$permission) {
            return $next($request);
        }

        // Obtener el usuario autenticado
        $user = Auth::user();

        // Verificar si el usuario tiene el permiso requerido
        if ($user && $user->hasPermission($permission)) {
            return $next($request);
        }

        // Si el usuario no tiene el permiso requerido, redirigir o mostrar un error
        return redirect()->route('/login')->with('error', 'No tienes permiso para acceder a esta ruta.');
    }

}
