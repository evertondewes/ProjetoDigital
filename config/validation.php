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

        'addresses' => [
            'number' => 'required|numeric',
            'street' => 'required',
            'district' => 'required',
            'city_id' => 'required',
        ],

        'phone_numbers' => [
            'phone' => 'required',
            'area_code' => 'required|numeric',
        ],

        'projects' => [
            'description' => 'required|string',
            'project_type_id' => 'required|numeric',
            'username' => 'required|exists:users',
        ],

        'project_addresses' => [
            'complement' => 'required',
            'street' => 'required',
            'district' => 'required',
            'area' => 'required|numeric',
        ],
    ],
];
