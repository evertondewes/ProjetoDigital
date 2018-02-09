<?php

namespace ProjetoDigital\Http\Controllers\Auth;

use ProjetoDigital\Http\Controllers\Controller;
use ProjetoDigital\Http\Requests\RegistrationForm;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(RegistrationForm $form)
    {
        $form->persist();

        $this->alert(
            'Cadastro efetuado com sucesso! Aguarde a ativação da sua conta.',
            'success'
        );

        return redirect('/login');
    }
}
