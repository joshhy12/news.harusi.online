<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $allowedEmail = 'admin@gmail.com';
       // $allowedEmail = 'binah@gmail.com';
       // Replace with your Gmail address

        if (auth()->check() && auth()->user()->email === $allowedEmail) {
            return $next($request);
        }

        abort(403, 'Unauthorized');
    }

}
