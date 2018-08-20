<?php

namespace ProjetoDigital\Http\Controllers\Auth;

use ProjetoDigital\Http\Controllers\Controller;
use ProjetoDigital\Http\Requests\RegistrationForm;
use ProjetoDigital\Mail\RegistroMail;
use Illuminate\Support\Facades\Mail;

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
        $user = $form;

        $form->persist();
        
        Mail::to($form->email)->send(new RegistroMail($user));

        $this->alert('Cadastro efetuado com sucesso! Aguarde a ativação da sua conta.');

        return redirect('/login');
    }
}
