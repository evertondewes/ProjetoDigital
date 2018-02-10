<?php

namespace ProjetoDigital\Http\Controllers\Backend;

use ProjetoDigital\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return view('backend.dashboard');
    }
}
