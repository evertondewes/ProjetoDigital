<?php

namespace ProjetoDigital\Http\Controllers\Backend;

use ProjetoDigital\Models\User;
use ProjetoDigital\Repositories\Roles;
use ProjetoDigital\Http\Controllers\Controller;
use ProjetoDigital\Http\Requests\BackendRegistrationForm;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(User::class);
    }

    public function index()
    {
        $filter = request('filter') ?? 1;
        $order = request('order') ?? 'asc';
        $by = request('by') ?? 'id';

        $users = User::where('active', $filter)
            ->orderBy($by, $order)
            ->paginate(10);

        return view(
            'backend.users.index',
            compact('users', 'order', 'by', 'filter')
        );
    }

    public function create(Roles $roles)
    {
        $full = request('account') ?? false;

        return view('backend.users.create', compact('full', 'roles'));
    }

    public function store(BackendRegistrationForm $form)
    {
        $form->persist()->createdBy(auth()->id())->activate();

        $this->alert('Cadastro efetuado com sucesso!');

        return back();
    }

    public function show(User $user)
    {
        return view('backend.users.show', compact('user'));
    }

    public function activate(User $user)
    {
        $user->activate();

        $this->alert('Usuário ativado com sucesso!');

        return back();
    }

    public function deactivate(User $user)
    {
        $this->authorize('delete', $user);

        $user->deletedBy(auth()->id())->deactivate();

        $this->alert('Usuário desativado com sucesso!');

        return back();
    }
}
