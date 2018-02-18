<?php

namespace ProjetoDigital\Models;

trait ModelTrait
{
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        static::unguard();
    }

    public function rules($column = null)
    {
        if (is_null($column)) {
            return config("validation.rules.{$this->getTable()}");
        }

        return config("validation.rules.{$this->getTable()}.{$column}");
    }
}
