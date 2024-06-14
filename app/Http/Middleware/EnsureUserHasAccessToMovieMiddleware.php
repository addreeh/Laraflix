<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnsureUserHasAccessToMovieMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $movieId = $request->route('movie'); // Suponiendo que el parámetro de la ruta se llame 'movie'

        // Aquí puedes implementar la lógica para verificar si el usuario tiene acceso a la película con el ID proporcionado

        return $next($request);
    }
}
