<?php

namespace ProjetoDigital\Http\Requests;

use ProjetoDigital\Models\User;
use ProjetoDigital\Models\Role;
use ProjetoDigital\Models\Person;
use Illuminate\Foundation\Http\FormRequest;

class RegistrationForm extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [];

        if ($this->hasAnyDataOf('people')) {
            $rules += config('validation.rules.people');
        }

        $rules += config('validation.rules.users');

        return $rules;
    }

    protected function hasAnyDataOf($table)
    {
        return $this->hasAny(
            ...array_keys(config("validation.rules.{$table}"))
        );
    }

    public function persist()
    {
        if ($this->hasAnyDataOf('people')) {
            $person = $this->createPerson();
        }

        $role = $this->normalizeRole($person ?? null);

        return $this->createUser([
            'email' => isset($person) ? $person->email : 'email@temporario.com',
            'role_id' => Role::where('name', $role)->first()->id,
            'person_id' => isset($person) ? $person->id : null,
        ]);
    }

    public function createPerson()
    {
        return Person::create(
            $this->only(['name', 'email', 'cpf_cnpj', 'crea_cau'])
        );
    }

    public function createUser(array $additional = null)
    {
        $data = [
            'username' => $this->input('username'),
            'password' => bcrypt($this->input('password')),
        ];

        return is_null($additional)
            ? User::create($data)
            : User::create($data + $additional);
    }

    protected function normalizeRole($person)
    {
        if ($this->has('access')) {
            return $this->input('access');
        }

        if ($person) {
            return $person->crea_cau ? 'responsavel_tecnico' : 'cliente';
        }

        return 'cliente';
    }
}
