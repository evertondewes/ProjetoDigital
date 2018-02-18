<?php

namespace ProjetoDigital\Http\Controllers;

use ProjetoDigital\Models\Person;
use ProjetoDigital\Models\Address;
use ProjetoDigital\Models\PhoneNumber;
use ProjetoDigital\Repositories\Rules;

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

    public function store(Rules $rules)
    {
        $this->validate(
            request(),
            $rules->remainingRegistration(auth()->user()->isEngineer())
        );

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
}
