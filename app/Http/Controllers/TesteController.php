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

        $request->validate([
                'guia_recolhimento' => 'mimes:pdf|max:10000',
                'plantas' => 'mimes:pdf|max:10000',
            ]);

        $id = 122;

        $folder = "projeto_".$id;

        !is_null($request->guia_recolhimento) ? $request->guia_recolhimento->storeAs($folder, 'guia_recolhimento.pdf') : null ;

        $i = 0;

        if (!is_null($request->plantas))
        {
            foreach ($request->plantas as $planta) 
            {
                $planta->storeAs($folder,'planta_baixa_'.$i.'.pdf');
                $i++;
            } 

            foreach ($request->plantas as $planta) 
            {
                $project->projectDocuments()->create([
                    'name' => 'planta_baixa_'.$i,
                    'path' => $planta->storeAs($folder,'planta_baixa_'.$i.'.pdf'),
                ]);
                $i++;
            } 
        }

        return back();
    }
}
