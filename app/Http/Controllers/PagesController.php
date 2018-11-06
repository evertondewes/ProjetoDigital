<?php

namespace ProjetoDigital\Http\Controllers;

use ProjetoDigital\Models\Project;
use Session;

class PagesController extends Controller
{
    public function index()
    {
        return view('pages.index');
    }

    public function consultProcess()
    {
        return view('pages.consult-process');
    }

    public function consultProcessResult(\Illuminate\Http\Request $request)
    {

        $project = Project::find($request->id);

        if($project->access_key == $request->access_key) {
            \Session::put('access_key_project_id_'. $project->id, $project->access_key);

            $events = $project->events;

            return view('pages.consult-process-result', compact('project', 'events'));
        } else {
            $this->alert('Processo ou chave inválida!');
            return redirect('/consult-process');
        }

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
