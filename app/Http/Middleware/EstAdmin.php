<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EstAdmin
{
    // Laisse passer uniquement les utilisateurs connectés dont le rôle est "admin"
    public function handle(Request $request, Closure $next)
    {
        if (! $request->user() || $request->user()->role != 'admin') {
            return redirect()->route('welcome_index')->with('error', 'Accès réservé aux administrateurs');
        }

        return $next($request);
    }
}
