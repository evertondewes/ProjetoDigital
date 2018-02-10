<?php

namespace ProjetoDigital\Http\Controllers\Backend;

use ProjetoDigital\Models\User;
use ProjetoDigital\Http\Controllers\Controller;
use ProjetoDigital\Http\Requests\RegistrationForm;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(User::class);
    }

    public function index()
    {

    }

    public function create()
    {
        return view('backend.users.create');
    }

    public function store(RegistrationForm $form)
    {

    }

    public function show(User $user)
    {
        return view('backend.users.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('backend.users.edit', compact('user'));
    }

    public function update(User $user)
    {

    }

    public function destroy(User $user)
    {

    }
}
