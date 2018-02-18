<?php

namespace ProjetoDigital\Http\Middleware;

use Closure;

class SanitizeCpfAndCnpj
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
        if ($request->has('cpf_cnpj')) {
            $sanitized = preg_replace('/\D+/', '', $request->input('cpf_cnpj'));

            $request->request->set('cpf_cnpj', $sanitized);
        }

        return $next($request);
    }
}
