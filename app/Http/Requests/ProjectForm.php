<?php

namespace ProjetoDigital\Http\Requests;

use ProjetoDigital\Facades\Cities;
use ProjetoDigital\Facades\Users;
use ProjetoDigital\Facades\Rules;
use ProjetoDigital\Models\Project;
use ProjetoDigital\Models\ProjectAddress;
use Illuminate\Foundation\Http\FormRequest;

class ProjectForm extends FormRequest
{
    public function authorize()
    {
        return auth()->user()->hasAnyRole('responsavel_tecnico');
    }

    public function rules()
    {
        return Rules::project();
    }

    public function persist()
    {
        $project = Project::create($this->only(['description', 'project_type_id']));
        $project->users()->attach(auth()->id());
        $project->users()->attach(Users::id($this->input('username')));

        $this->createAddress($project);

        return $project;
    }

    public function update(Project $project)
    {
        $project->update($this->only(['description', 'project_type_id']));
        $project->users()->detach($project->owner->id);
        $project->users()->attach(Users::id($this->input('username')));

        $this->createAddress($project);

        return $project;
    }

    protected function createAddress(Project $project)
    {
        return ProjectAddress::create($this->only([
            'complement', 'street', 'district', 'area'
        ]) + ['project_id' => $project->id, 'city_id' => Cities::id(env('CITY'))]);
    }
}
