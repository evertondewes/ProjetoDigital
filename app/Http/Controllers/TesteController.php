<?php

namespace ProjetoDigital\Http\Controllers;

use Illuminate\Http\Request;

class TesteController extends Controller
{
    public function index()
    {
        return view('pages.teste');
    }

    public function store(Request $request)
    {
        foreach ($request->documentos as $file) {
           //$file->store('teste');
            dd($file->id);
        }

        return back();
    }
}
