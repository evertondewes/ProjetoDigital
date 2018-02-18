<?php

namespace ProjetoDigital\Http\Controllers\Backend;

use ProjetoDigital\Models\Person;
use ProjetoDigital\Repositories\Roles;
use ProjetoDigital\Http\Controllers\Controller;
use ProjetoDigital\Http\Requests\BackendUserRegistrationForm;

class PeopleController extends Controller
{
    public function index()
    {
        $order = request('order') ?? 'asc';
        $by = request('by') ?? 'id';

        $people = Person::orderBy($by, $order)->paginate(10);

        return view('backend.people.index', compact('people'));
    }

    public function show(Person $person)
    {
        return view('backend.people.show', compact('person'));
    }

    public function showAddUserForm(Person $person, Roles $roles)
    {
        return view('backend.people.add-user', compact('person', 'roles'));
    }

    public function addUser(Person $person, BackendUserRegistrationForm $form)
    {
        $person->users()->save(
            $form->persist()
                ->email($person->email)
                ->createdBy(auth()->id())
                ->activate()
        );

        $this->alert('Conta adicionada com sucesso!');

        return back();
    }
}
