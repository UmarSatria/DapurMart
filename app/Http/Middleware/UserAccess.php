<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UserAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && Auth::user()->role == 'Admin') {
            return $next($request);
        }

        // Jika kondisi tidak terpenuhi, Anda dapat mengembalikan respons redirect atau respons lainnya
        // Di sini, contohnya adalah mengembalikan respons 403 Forbidden
        return to_route('home');
    }
}
