<?php

namespace ProjetoDigital\Facades;

use Illuminate\Support\Facades\Facade;
use ProjetoDigital\Repositories\Rules as RulesRepository;

class Rules extends Facade
{
    protected static function getFacadeAccessor()
    {
        return RulesRepository::class;
    }
}
