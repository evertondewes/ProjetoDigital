<?php

namespace ProjetoDigital\Http\Controllers;

class RedirectionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function redirect()
    {
        return auth()->user()->isBackendWorker()
            ? redirect('/backend/dashboard')
            : redirect('/dashboard');
    }
}
