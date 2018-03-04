<?php

namespace ProjetoDigital\Repositories;

use Illuminate\Database\Eloquent\Builder;

abstract class DatabaseRepository
{
    protected $builder;
    protected $mainUniqueColumn;

    public function __construct(Builder $builder, $mainUniqueColumn = 'name')
    {
        $this->builder = $builder;
        $this->mainUniqueColumn = $mainUniqueColumn;
    }

    public function all()
    {
        return $this->builder->get();
    }

    public function id($value)
    {
        if (! is_array($value)) {
            return $this->builder->where($this->mainUniqueColumn, $value)
                ->first()
                ->id;
        }

        return $this->builder->whereIn($this->mainUniqueColumn, $value)
            ->pluck('id')
            ->toArray();
    }

    public function find($value)
    {
        if (is_string($value)) {
            return $this->builder->where($this->mainUniqueColumn, $value)
                ->first();
        }

        return $this->builder->find($value);
    }
}
