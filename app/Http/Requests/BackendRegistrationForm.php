<?php

namespace ProjetoDigital\Http\Requests;

use Exception;
use ProjetoDigital\Facades\Rules;
use ProjetoDigital\Facades\Roles;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Http\FormRequest;

class BackendRegistrationForm extends FormRequest
{
    use PersistsRegistrationData, ChecksFormFields;

    public function authorize()
    {
        return auth()->user()->isBackendWorker();
    }

    public function rules()
    {
        $rules = [];

        if ($this->hasAnyDataOf('people')) {
            $rules += Rules::people();
        }

        $rules += Rules::table('users');
        $rules += ['access' => 'required'];

        return $rules;
    }

    public function persist()
    {
        try {
            DB::beginTransaction();

            if ($this->hasAnyDataOf('people')) {
                $person = $this->createPerson();
                $this->createAddress($person->id);
                $this->createPhoneNumber($person->id);
            }

            $role = $this->input('access');

            $user = $this->createUser([
                'email' => isset($person) ? $person->email : 'email@temporario.com',
                'role_id' => Roles::id($role),
                'person_id' => isset($person) ? $person->id : null,
            ]);

            DB::commit();

            return $user;
        } catch (Exception $e) {
            DB::rollback();

            throw $e;
        }
    }
}
