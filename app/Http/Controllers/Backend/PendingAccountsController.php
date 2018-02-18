<?php

namespace ProjetoDigital\Http\Controllers\Backend;

use ProjetoDigital\Models\User;
use ProjetoDigital\Http\Controllers\Controller;

class PendingAccountsController extends Controller
{
    public function index()
    {
        $accounts = User::customer()
            ->where('active', false)
            ->whereNotNull('person_id')
            ->whereNull('created_by')
            ->latest()
            ->get();

        return view('backend.pending-accounts.index', compact('accounts'));
    }

    public function show($id)
    {
        $user = User::find($id);

        if ($user->isActive()) {
            return back();
        }

        return view('backend.pending-accounts.show', compact('user'));
    }

    public function activate(User $user)
    {
        $user->createdBy(auth()->id())->activate();

        $this->alert('Conta ativada com sucesso!');

        return redirect('/backend/pending-accounts');
    }
}
