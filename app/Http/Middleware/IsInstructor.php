<?php

namespace App\Http\Middleware;

use Closure;

class IsInstructor
{
    public function handle($request, Closure $next)
    {
				return ($request->user()->instructor) ? $next($request) : redirect('/');
    }
}
