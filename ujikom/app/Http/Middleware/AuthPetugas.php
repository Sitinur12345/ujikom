<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AuthPetugas
{
    public function handle(Request $request, Closure $next)
    {
        if (!Session::has('petugas_id')) {
            return redirect('/login');
        }
        return $next($request);
    }
}
