<?php

namespace ProjetoDigital\Http\Requests;

use ProjetoDigital\Models\User;
use ProjetoDigital\Models\Role;
use ProjetoDigital\Models\Person;
use ProjetoDigital\Rules\CpfOrCnpj;
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

        if ($this->hasPersonData()) {
            $rules += $this->personRules();
        }

        $rules += $this->userRules();

        return $rules;
    }

    protected function hasPersonData()
    {
        return $this->has('name', 'cpf_cnpj', 'crea_cau', 'email');
    }

    protected function personRules()
    {
        return [
            'name' => 'required',
            'cpf_cnpj' => ['required', new CpfOrCnpj, 'unique:people'],
            'crea_cau' => 'bail|nullable|min:8|max:11|unique:people',
            'email' => 'required|email|unique:people',
        ];
    }

    protected function userRules()
    {
        return [
            'username' => 'required|string|min:3|unique:users',
            'password' => 'required|min:6|confirmed',
        ];
    }

    public function persist()
    {
        $person = null;

        if ($this->hasPersonData()) {
            $person = Person::create(
                $this->only(['name', 'email', 'cpf_cnpj', 'crea_cau'])
            );
        }

        $role = $this->normalizeRole($person);

        return User::create([
            'email' => is_null($person) ? 'email@temporario.com' : $person->email,
            'username' => $this->input('username'),
            'password' => bcrypt($this->input('password')),
            'role_id' => Role::where('name', $role)->first()->id,
            'person_id' => is_null($person) ? null : $person->id,
        ]);
    }

    protected function normalizeRole($person)
    {
        if (is_null($person) || $this->has('access')) {
            return $this->input('access');
        }

        return $person->crea_cau ? 'engenheiro-cliente' : 'cliente';
    }
}
