<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnsureUserHasVerifiedEmailMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        if (!$user || !$user->hasVerifiedEmail()) {
            return redirect()->route('verification.notice'); // Redirige al usuario a la página de verificación de correo electrónico si no ha verificado su dirección de correo electrónico
        }

        return $next($request);
    }
}
