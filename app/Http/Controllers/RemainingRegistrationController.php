<?php

namespace ProjetoDigital\Http\Controllers;

use ProjetoDigital\Models\Person;
use ProjetoDigital\Models\Address;
use ProjetoDigital\Models\PhoneNumber;

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

        $person = Person::create(request([
            'name', 'email', 'cpf_cnpj', 'crea_cau'
        ]));

        Address::create(request([
            'number', 'street', 'district', 'city_id'
        ]) + ['person_id' => $person->id]);

        PhoneNumber::create(request([
            'phone', 'area_code'
        ]) + ['person_id' => $person->id]);

        auth()->user()->update([
            'person_id' => $person->id,
            'email' => $person->email,
            'password' => bcrypt(request('password')),
        ]);

        return redirect('/redirect-user');
    }

    protected function validationRules()
    {
        $rules = config('validation.rules.people');
        $rules += ['password' => config('validation.rules.users')['password']];
        $rules += config('validation.rules.addresses');
        $rules += config('validation.rules.phone_numbers');

        if (auth()->user()->isEngineer()) {
            $rules['crea_cau'] = str_replace('nullable', 'required', $rules['crea_cau']);
        }

        return $rules;
    }
}
