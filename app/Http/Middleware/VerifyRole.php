<?php

namespace App\Http\Middleware;

use App\Models\RoleModel;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class VerifyRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role)
    {
        // Obtener el usuario autenticado
        $user = Auth::user();

        // Si no hay un usuario autenticado, redirigir a la página de inicio de sesión
        if (!$user) {
            return redirect()->route('auths.login')->with('error', 'Debes iniciar sesión para acceder a esta ruta.');
        }

        // Verificar si el usuario tiene el rol requerido
        if ($user->roles->contains('name', $role)) {
            return $next($request);
        }

        // Si el usuario no tiene el rol requerido, redirigir o mostrar un error
        return redirect()->route('auths.login')->with('error', 'No tienes permiso para acceder a esta ruta.');
    }
}
