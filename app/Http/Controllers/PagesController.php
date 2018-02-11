<?php

namespace ProjetoDigital\Http\Controllers;

class PagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function index()
    {
        return view('pages.index');
    }

    public function about()
    {
        return view('pages.about');
    }

    public function help()
    {
        return view('pages.help');
    }
}
