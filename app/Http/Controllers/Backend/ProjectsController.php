<?php

namespace ProjetoDigital\Http\Controllers\Backend;

use ProjetoDigital\Models\Project;
use ProjetoDigital\Http\Controllers\Controller;

class ProjectsController extends Controller
{
    public function index()
    {
        return view('backend.projects.index', [
            'projects' => Project::latest()->paginate(10),
        ]);
    }

    public function show(Project $project)
    {
        return view('backend.projects.show', compact('project'));
    }
}
