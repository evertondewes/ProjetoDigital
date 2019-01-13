<?php

namespace ProjetoDigital\Http\Controllers;

use Illuminate\Support\Facades\Gate;
use ProjetoDigital\Http\Requests\OwnerForm;
use ProjetoDigital\Models\Project;
use ProjetoDigital\Models\Event;
use Auth;

class OwnersController extends Controller
{
    public function create(Project $project = null)
    {

        if (Gate::denies('add-owner', $project)) {
            abort(403);
        }
        $project = session()->get('project_data')['project'];

        $cpf_cnpj = session('project_data')['owner']['cpf_cnpj'];

        return view('customer.projects.add-owner', ['project' => $project, 'cpf_cnpj' => $cpf_cnpj] );
    }

    public function store(OwnerForm $form, Project $project = null)
    {
        if (Gate::denies('add-owner', $project)) {
            abort(403);
        }

        $owner = $form->persist();

        if (is_null($project)) {
            return back();
        }

        $project->people()->attach($owner);

        $event = session()->get('event_data');

        Event::sendMailProjectStatus($owner->email, $project, $event);


        $this->alert('Requerente adicionado com sucesso!');

        return redirect('/project-docs/send/' . $project->id);
    }

//    protected function pendingOwnerRegistrationResponse(OwnerForm $form)
//    {
//
//
//        $form->persist();
//
//        $projectData = session('project_data');
//dd($projectData);
//        return redirect('/project-docs/send/'. $projectData['project']->id);
//
//        //return redirect('/projects');
//    }
}
