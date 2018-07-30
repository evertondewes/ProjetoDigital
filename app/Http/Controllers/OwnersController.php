<?php

namespace ProjetoDigital\Http\Controllers;

use Illuminate\Support\Facades\Gate;
use ProjetoDigital\Http\Requests\OwnerForm;
use ProjetoDigital\Models\Project;

class OwnersController extends Controller
{
    public function create(Project $project = null)
    {
        if (Gate::denies('add-owner', $project)) {
            abort(403);
        }

        session()->reflash();

        $hasProjectData = session()->has('project_data');

        return view('customer.projects.add-owner', compact('project', 'hasProjectData'));
    }

    public function store(OwnerForm $form, Project $project = null)
    {
        if (Gate::denies('add-owner', $project)) {
            abort(403);
        }

        if (is_null($project)) {
            return $this->pendingOwnerRegistrationResponse($form);
        }

        $project->people()->attach($form->persist());

        $this->alert('Requerente adicionado com sucesso!');

        return back();
    }

    protected function pendingOwnerRegistrationResponse(OwnerForm $form)
    {
        $form->persist();

        $this->alert('Solicitação cadastrada com sucesso!');

        return redirect('/projects');
    }
}
