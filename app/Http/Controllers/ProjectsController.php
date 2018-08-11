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
            return $this->personNotFoundResponse($form);
        }

        $project = $form->persist();

        //$this->alert('Solicitação cadastrada com sucesso!');

        return redirect('/project-docs/send/'.$project->id);
    }

    protected function personNotFoundResponse(ProjectForm $form)
    {
        $projectData = [
            'project' => $form->only(['description', 'project_type_id']),
            'address' => $form->only(['complement', 'number', 'street', 'district', 'area']),
            'owner' => $form->only(['cpf_cnpj']),
        ];

        $projectData['address'] += ['city_id' => Cities::id(env('CITY'))];

        /*foreach ((array) $form->file('project_documents') as $file) {
            $projectData['documents'][] = [
                'name' => $file->getClientOriginalName(),
                'path' => $file->store('temp'),
            ];
        }*/

        session()->flash('project_data', $projectData);

        return redirect('/owners/add');
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
}
