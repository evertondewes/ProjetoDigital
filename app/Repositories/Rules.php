<?php

namespace ProjetoDigital\Repositories;

class Rules
{
    protected $rules = [];

    public function __construct(array $rules)
    {
        $this->rules = $rules;
    }

    public function registration()
    {
        return $this->people() + $this->table('users');
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

    public function update($table, $column, $id)
    {
        return $this->table($table, $column) . ",{$column},{$id}";
    }

    public function people()
    {
        return $this->table('people')
            + $this->table('addresses')
            + $this->table('phone_numbers');
    }

    public function project()
    {
        return $this->table('projects') + $this->table('project_addresses');
    }

    public function table($table, $column = null)
    {
        if (! $column) {
            return $this->rules[$table];
        }

        return $this->rules[$table][$column];
    }
}
