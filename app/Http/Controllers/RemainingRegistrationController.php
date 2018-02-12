<?php

namespace ProjetoDigital\Http\Controllers;

use ProjetoDigital\Models\Person;
use ProjetoDigital\Rules\CpfOrCnpj;

class RemainingRegistrationController extends Controller
{
    public function __construct()
    {
        $this->middleware('not-full-registered');
    }

    public function create()
    {
        return view('remaining-register');
    }

    public function store()
    {
        $this->validate(request(), $this->validationRules());

        $person = Person::create(request(['name', 'email', 'cpf_cnpj', 'crea_cau']));

        $user = auth()->user();

        $user->person_id = $person->id;
        $user->email = $person->email;
        $user->password = bcrypt(request('password'));

        $user->save();

        return redirect('/redirect-user');
    }

    protected function validationRules()
    {
        $rules = [
            'name' => 'required',
            'cpf_cnpj' => ['required', new CpfOrCnpj, 'unique:people'],
            'crea_cau' => 'bail|nullable|min:8|max:11|unique:people',
            'email' => 'required|email|unique:people',
            'password' => 'required|min:6|confirmed',
        ];

        if (auth()->user()->isEngineer()) {
            $rules['crea_cau'] = str_replace('nullable', 'required', $rules['crea_cau']);
        }

        return $rules;
    }
}
