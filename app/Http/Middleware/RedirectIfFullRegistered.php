<?php

namespace ProjetoDigital\Http\Middleware;

use Closure;

class RedirectIfFullRegistered
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
        $user = $request->user();

        if (auth()->check() && ! is_null($user->person_id)) {
            return redirect('/redirect-user');
        }

        return $next($request);
    }
}
