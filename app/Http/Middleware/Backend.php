<?php

namespace ProjetoDigital\Http\Middleware;

use Closure;

class Backend
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (auth()->check() && auth()->user()->isBackendWorker()) {
            return $next($request);
        }

        abort(403);
    }
}
