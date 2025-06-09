<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    public function handle(Request $request, Closure $next)
    {
        // TESTING: Angalia kama user yupo
        if (!Auth::check()) {
            abort(403, 'User not authenticated');
        }

        // TESTING: Angalia kama is_admin ni kweli
        if (Auth::user()->is_admin != 1) {
            dd([
                'user_id' => Auth::id(),
                'is_admin' => Auth::user()->is_admin,
            ]);
            abort(403, 'User is not admin');
        }

        return $next($request);
    }
}

