<?php

namespace ProjetoDigital\Http\Controllers;

use Illuminate\Support\Facades\DB;
use ProjetoDigital\Repositories\Rules;
use ProjetoDigital\Http\Requests\PersistsRegistrationData;

class RemainingRegistrationController extends Controller
{
    use PersistsRegistrationData;

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

        DB::transaction(function () {
            $person = $this->createPerson();
            $this->createAddress($person->id);
            $this->createPhoneNumber($person->id);

            auth()->user()->update([
                'person_id' => $person->id,
                'email' => $person->email,
                'password' => bcrypt(request('password')),
            ]);
        });

        return redirect('/redirect-user');
    }
}
