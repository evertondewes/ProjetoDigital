<?php

namespace ProjetoDigital\Http\Controllers;

use ProjetoDigital\Http\Requests\PendingOwnerForm;

class OwnersController extends Controller
{
    public function create()
    {
        return view('customer.projects.add-owner');
    }

    public function store(PendingOwnerForm $form)
    {
        $form->persist();

        $this->alert('Solicitação cadastrada com sucesso!');

        return redirect('/projects');
    }
}
