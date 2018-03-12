<?php

namespace ProjetoDigital\Http\Requests;

use Exception;
use ProjetoDigital\Facades\Rules;
use ProjetoDigital\Facades\Cities;
use ProjetoDigital\Facades\People;
use ProjetoDigital\Models\Project;
use Illuminate\Support\Facades\DB;
use ProjetoDigital\Models\ProjectAddress;
use Illuminate\Foundation\Http\FormRequest;

class ProjectForm extends FormRequest
{
    public function authorize()
    {
        return auth()->user()->isTechnicalManager();
    }

    public function rules()
    {
        return $this->isMethod('POST')
            ? Rules::project()
            : array_except(Rules::project(), ['cpf_cnpj']);
    }

    public function persist()
    {
        try {
            DB::beginTransaction();

            $project = Project::create($this->only(['description', 'project_type_id']));
            $project->users()->attach(auth()->id());
            $project->people()->attach(People::id($this->input('cpf_cnpj')));

            $files = $this->file('project_documents');

            foreach ((array) $files as $file) {
                $project->projectDocuments()->create([
                    'name' => $file->getClientOriginalName(),
                    'path' => $file->store('public/project_documents'),
                ]);
            }

            $this->createAddress($project);

            DB::commit();
        } catch (Exception $e) {
            DB::rollback();

            throw $e;
        }

        return $project;
    }

    public function update(Project $project)
    {
        $project->update($this->only(['description', 'project_type_id']));

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
