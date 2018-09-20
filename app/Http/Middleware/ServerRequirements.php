<?php

namespace ProjetoDigital\Http\Middleware;

use Closure;

class ServerRequirements
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(\Illuminate\Http\Request $request, Closure $next)
    {
        if (! env('STATE') || ! env('CITY')) {
            abort(500, 'A localização do sistema não foi configurada!');
        }

        if ($request->has('cpf_cnpj')) {
            $sanitized = preg_replace('/\D+/', '', $request->input('cpf_cnpj'));

            $request->request->set('cpf_cnpj', $sanitized);
        }

        if($request->path() == 'logout') {
            \Auth::logout();
            \Session::flush();
            return redirect('/');
        }

        return $next($request);
    }
}
