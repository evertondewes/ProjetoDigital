<?php

namespace ProjetoDigital\Http\Requests;

use ProjetoDigital\Facades\Roles;
use ProjetoDigital\Facades\Rules;
use Illuminate\Foundation\Http\FormRequest;

class RegistrationForm extends FormRequest
{
    use DealsWithUserRegistration;

    public function authorize()
    {
        return auth()->guest();
    }

    public function rules()
    {
        return Rules::registration();
    }

    public function persist()
    {
        $person = $this->createPerson();
        $this->createAddress($person->id);
        $this->createPhoneNumber($person->id);

        $role = $this->normalizeRole($person);

        $this->createUser([
            'email' => $person->email,
            'role_id' => Roles::id($role),
            'person_id' => $person->id,
        ]);
    }

    protected function normalizeRole($person)
    {
        return $person->crea_cau ? 'responsavel_tecnico' : 'cliente';
    }
}
