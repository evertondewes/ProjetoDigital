<?php

namespace ProjetoDigital\Facades;

use Illuminate\Support\Facades\Facade;
use ProjetoDigital\Repositories\People as PeopleRepository;

class People extends Facade
{
    protected static function getFacadeAccessor()
    {
        return PeopleRepository::class;
    }
}
