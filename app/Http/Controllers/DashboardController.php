<?php

namespace ProjetoDigital\Http\Controllers;

class DashboardController extends Controller
{
    public function index()
    {
        return view('customer.dashboard');
    }
}
