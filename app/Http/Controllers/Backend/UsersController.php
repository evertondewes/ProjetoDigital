<?php

namespace ProjetoDigital\Http\Controllers\Backend;

use ProjetoDigital\Models\User;
use ProjetoDigital\Rules\IgnoreIfEqualTo;
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
        $filter = request('filter') ?? 1;
        $order = request('order') ?: 'asc';
        $by = request('by') ?: 'id';

        $users = User::where('active', $filter)
            ->orderBy($by, $order)
            ->paginate(10);

        return view(
            'backend.users.index',
            compact('users', 'order', 'by', 'filter')
        );
    }

    public function create()
    {
        $full = request('account') ?? false;

        return view('backend.users.create', compact('full'));
    }

    public function store(RegistrationForm $form)
    {
        $form->persist()
            ->createdBy(auth()->id())
            ->activate();

        $this->alert('Cadastro efetuado com sucesso!');

        return back();
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
        $username = $user->username;

        $this->validate(request(), [
            'username' => ['required', 'string', 'min:3', new IgnoreIfEqualTo($username, 'users')],
        ]);

        $user->update([
            'username' => request('username'),
            'active' => request()->has('active'),
        ]);

        $this->alert('Alteração salva com sucesso!');

        return back();
    }

    public function destroy(User $user)
    {
    }
}
