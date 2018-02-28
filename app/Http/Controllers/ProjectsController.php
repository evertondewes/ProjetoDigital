<?php

namespace ProjetoDigital\Http\Controllers;

use ProjetoDigital\Models\Project;
use ProjetoDigital\Models\ProjectType;
use ProjetoDigital\Repositories\Users;
use ProjetoDigital\Http\Requests\ProjectForm;

class ProjectsController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Project::class);
    }

    public function index()
    {
        return view('customer.projects.index', [
            'projects' => auth()->user()->projects()->latest()->paginate(10),
        ]);
    }

    public function create()
    {
        return view('customer.projects.create', [
            'projectTypes' => ProjectType::all(),
        ]);
    }

    public function store(ProjectForm $form, Users $users)
    {
        if ($users->find($form->input('username'))->role->name !== 'cliente') {
            $this->alert('O usuário fornecido não é um cliente', 'danger');

            return back();
        }

        $form->persist();

        $this->alert('Solicitação cadastrada com sucesso!');

        return back();
    }

    public function show(Project $project)
    {
        return view('customer.projects.show', compact('project'));
    }

    public function edit(Project $project)
    {
        return view('customer.projects.edit', [
            'project' => $project,
            'projectTypes' => ProjectType::all(),
        ]);
    }

    public function update(Project $project, ProjectForm $form, Users $users)
    {
        if ($users->find($form->input('username'))->role->name !== 'cliente') {
            $this->alert('O usuário fornecido não é um cliente', 'danger');

            return back();
        }

        $form->update($project);

        $this->alert('Solicitação atualizada com sucesso!');

        return back();
    }

    public function destroy(Project $project)
    {
        $project->deletedBy(auth()->id())->delete();

        $this->alert('Solicitação excluída com sucesso!');

        return redirect('/projects');
    }
}
