<?php

namespace ProjetoDigital\Http\Controllers;

use ProjetoDigital\Facades\Cities;
use ProjetoDigital\Facades\People;
use ProjetoDigital\Models\Project;
use ProjetoDigital\Models\ProjectType;
use ProjetoDigital\Http\Requests\ProjectForm;

class ProjectsController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Project::class);
    }

    public function index()
    {
        $user = auth()->user();

        $projects = $user->isTechnicalManager()
            ? $user->projects()->latest()->paginate(10)
            : $user->person->projects()->latest()->paginate(10);

        return view('customer.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('customer.projects.create', [
            'projectTypes' => ProjectType::all(),
        ]);
    }

    public function store(ProjectForm $form)
    {
        if (is_null(People::find($form->input('cpf_cnpj')))) {
            $this->validate($form, $form->rules());

            $projectData = [
                'project' => $form->only(['description', 'project_type_id']),
                'address' => $form->only(['complement', 'street', 'district', 'area']),
                'owner' => $form->only(['cpf_cnpj']),
            ];

            $projectData['address'] += ['city_id' => Cities::id(env('CITY'))];

            session(['project_data' => $projectData]);

            return redirect('/projects/owners/add');
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

    public function update(Project $project, ProjectForm $form)
    {
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

    public function showHistoric(Project $project)
    {
        return view('customer.projects.historic', [
            'project' => $project,
            'events' => $project->events()->latest()->get(),
        ]);
    }
}
