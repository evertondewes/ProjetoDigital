<?php

namespace ProjetoDigital\Http\Requests;

use Exception;
use Auth;
use ProjetoDigital\Facades\Rules;
use ProjetoDigital\Models\Project;
use ProjetoDigital\Facades\People;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Http\FormRequest;

class OwnerForm extends FormRequest
{
    use PersistsRegistrationData;

    public function authorize()
    {
        return auth()->user()->isTechnicalManager();
    }

    public function rules()
    {
        return Rules::people();
    }

    public function persist()
    {
        try {
            DB::beginTransaction();

            $person = $this->createPerson();
            $this->createAddress($person->id);
            $this->createPhoneNumber($person->id);

            if (! session()->has('project_data')) {
                DB::commit();

                return $person;
            }

            $projectData = session('project_data');

            $project = Project::create($projectData['project']);
            $project->users()->attach(auth()->id());
            $project->people()->attach(People::id($this->input('cpf_cnpj')));

            $project->projectAddresses()->create($projectData['address']);

            session()->forget('project_data');

            DB::commit();

            return $project;
        } catch (Exception $e) {
            DB::rollback();

            throw $e;
        }
    }
}
