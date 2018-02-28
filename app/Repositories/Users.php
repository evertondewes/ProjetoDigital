<?php

namespace ProjetoDigital\Repositories;

class Users extends DatabaseRepository
{
    public function id($username)
    {
        return $this->builder->where('username', $username)->first()->id;
    }

    public function find($column)
    {
        if (is_numeric($column)) {
            return $this->builder->find($column);
        }

        return $this->builder->where('username', $column)->first();
    }
}
