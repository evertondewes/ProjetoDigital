<?php

namespace ProjetoDigital\Http\Middleware;

use Closure;

class MustHaveSessionData
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @param $key
     * @return mixed
     */
    public function handle($request, Closure $next, $key)
    {
        if (! $request->session()->has($key)) {
            abort(403);
        }

        return $next($request);
    }
}
