<?php

namespace ProjetoDigital\Http\Middleware;

use Closure;

class Customer
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

        if (auth()->check() && $user->isActive() && ($user->isCustomer() || $user->isSecretary())) {
            return $next($request);
        }

        abort(403);
    }
}
