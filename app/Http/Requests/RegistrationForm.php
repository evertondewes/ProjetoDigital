<?php

namespace ProjetoDigital\Http\Requests;

use ProjetoDigital\Models\User;
use ProjetoDigital\Models\Role;
use ProjetoDigital\Models\Person;
use ProjetoDigital\Rules\CpfOrCnpj;
use Illuminate\Foundation\Http\FormRequest;

class RegistrationForm extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'cpf_cnpj' => ['required', new CpfOrCnpj, 'unique:people'],
            'crea_cau' => 'bail|nullable|min:8|max:11|unique:people',
            'email' => 'required|email|unique:people',
            'username' => 'required|string|min:3|unique:users',
            'password' => 'required|min:6|confirmed',
        ];
    }

    public function persist()
    {
        $person = Person::create(
            $this->only(['name', 'email', 'cpf_cnpj', 'crea_cau'])
        );

        $role = $person->crea_cau ? 'engenheiro-cliente' : 'cliente';

        return User::create([
            'email' => $person->email,
            'username' => $this->input('username'),
            'password' => bcrypt($this->input('password')),
            'role_id'  => Role::where('name', $role)->first()->id,
            'person_id' => $person->id,
        ]);
    }
}
