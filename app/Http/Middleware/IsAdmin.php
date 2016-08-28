<?php

namespace App\Http\Middleware;

use Closure;

class IsAdmin
{
    public function handle($request, Closure $next)
    {
				return ($request->user()->admin) ? $next($request) : redirect('/');
    }
}
