<?php

namespace ProjetoDigital\Facades;

use Illuminate\Support\Facades\Facade;
use ProjetoDigital\Repositories\Cities as CitiesRepository;

class Cities extends Facade
{
    protected static function getFacadeAccessor()
    {
        return CitiesRepository::class;
    }
}
