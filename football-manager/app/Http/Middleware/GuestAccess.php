<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GuestAccess
{
    public function handle(Request $request, Closure $next)
    {
        // Само гости (non-admin users) можат да гледаат
        if (Auth::check() && !Auth::user()->is_admin) {
            return $next($request);
        }

        // Админите да не можат да ја користат оваа ruta
        return redirect()->route('dashboard')->with('error', 'Немате пристап до оваа страница.');
    }
}
