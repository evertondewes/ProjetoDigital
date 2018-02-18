<?php

use ProjetoDigital\Rules\CpfOrCnpj;

return [
    'rules' => [
        'people' => [
            'name' => 'required',
            'cpf_cnpj' => ['required', new CpfOrCnpj, 'unique:people'],
            'crea_cau' => 'bail|required_if:access,engenheiro,responsavel_tecnico|nullable|min:8|max:11|unique:people',
            'email' => 'required|email|unique:people',
        ],

        'users' => [
            'username' => 'required|string|min:3|unique:users',
            'password' => 'required|min:6|confirmed',
        ],
    ],
];
