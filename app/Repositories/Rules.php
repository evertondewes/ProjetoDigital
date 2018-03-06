<?php

namespace ProjetoDigital\Repositories;

use Illuminate\Support\Arr;

class Rules
{
    protected $rules = [];

    public function __construct(array $rules)
    {
        $this->rules = $rules;
    }

    public function registration()
    {
        return $this->people() + $this->rules['users'];
    }

    public function remainingRegistration($isEngineer)
    {
        $result = $this->people()
            + ['password' => $this->table('users', 'password')];

        if ($isEngineer) {
            $result['crea_cau'] = str_replace('nullable', 'required', $result['crea_cau']);
        }

        return $result;
    }

    public function table($table, $column = null)
    {
        $column = is_null($column) ? '' : ".{$column}";

        return Arr::get($this->rules, "{$table}{$column}");
    }

    public function people()
    {
        return $this->rules['people']
            + $this->rules['addresses']
            + $this->rules['phone_numbers'];
    }

    public function project()
    {
        return $this->rules['projects'] + $this->rules['project_addresses'];
    }
}
