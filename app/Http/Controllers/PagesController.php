<?php

namespace ProjetoDigital\Http\Controllers;

use ProjetoDigital\Models\Project;

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
            return view('customer.projects.show', compact('project'));
        } else {

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
