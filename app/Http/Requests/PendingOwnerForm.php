<?php

namespace ProjetoDigital\Http\Requests;

use ProjetoDigital\Facades\Rules;
use Illuminate\Support\Facades\DB;
use ProjetoDigital\Models\Project;
use ProjetoDigital\Facades\People;
use ProjetoDigital\Models\ProjectAddress;
use Illuminate\Foundation\Http\FormRequest;

class PendingOwnerForm extends FormRequest
{
    use PersistsRegistrationData;

    public function authorize()
    {
        return auth()->user()->isTechnicalManager() &&
            session()->has('project_data');
    }

    public function rules()
    {
        return Rules::people();
    }

    public function persist()
    {
        DB::transaction(function () {
            $person = $this->createPerson();
            $this->createAddress($person->id);
            $this->createPhoneNumber($person->id);

            $project = Project::create(session('project_data')['project']);
            $project->users()->attach(auth()->id());
            $project->people()->attach(People::id($this->input('cpf_cnpj')));

            ProjectAddress::create(
                session('project_data')['address'] + ['project_id' => $project->id]
            );
        });

        session()->forget('project_data');
    }
}
