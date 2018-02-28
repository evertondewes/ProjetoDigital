<?php

namespace ProjetoDigital\Repositories;

use Illuminate\Database\Eloquent\Builder;

abstract class DatabaseRepository
{
    protected $builder;

    public function __construct(Builder $builder)
    {
        $this->builder = $builder;
    }

    public function all()
    {
        return $this->builder->get();
    }

    public function id($name)
    {
        return $this->builder->where('name', $name)->first()->id;
    }
}
