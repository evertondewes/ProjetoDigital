<?php

namespace ProjetoDigital\Http\Controllers;

class RedirectionsController extends Controller
{
    public function redirectUser()
    {
        if (auth()->check()) {
            return auth()->user()->isBackendWorker()
                ? redirect('/backend/dashboard')
                : redirect('/dashboard');
        }

        return redirect('/');
    }
}
