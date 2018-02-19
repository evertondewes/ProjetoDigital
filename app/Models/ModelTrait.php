<?php

namespace ProjetoDigital\Models;

use ProjetoDigital\Facades\Rules;

trait ModelTrait
{
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        static::unguard();
    }

    public function rules($column = null)
    {
        return Rules::table($this->getTable(), $column);
    }
}
