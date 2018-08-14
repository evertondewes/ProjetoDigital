<?php

namespace ProjetoDigital\Http\Controllers\Backend;

use ProjetoDigital\Models\User;
use ProjetoDigital\Models\Person;
use ProjetoDigital\Repositories\Roles;
use ProjetoDigital\Http\Controllers\Controller;
use ProjetoDigital\Http\Requests\BackendRegistrationForm;

class PeopleController extends Controller
{
    public function index()
    {
        $order = request('order') ?? 'asc';
        $by = request('by') ?? 'id';

        $people = Person::with(['users' => function ($q) {
            $q->orderBy('id', 'asc/desc');
        }])->paginate(10);

        //$people = Person::orderBy($people->users, $order)->paginate(10);

        return view('backend.people.index', compact('people', 'order', 'by'));
    }

    public function show(Person $person)
    {
        $this->authorize('view', $person);

        return view('backend.people.show', compact('person'));
    }

    public function showAddUserForm(Person $person, Roles $roles)
    {
        $this->authorize('create', User::class);

        return view('backend.people.add-user', compact('person', 'roles'));
    }

    public function addUser(Person $person, BackendRegistrationForm $form)
    {
        $this->authorize('create', User::class);

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
