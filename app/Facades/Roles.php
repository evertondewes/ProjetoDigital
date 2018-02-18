<?php

namespace ProjetoDigital\Facades;

use Illuminate\Support\Facades\Facade;
use ProjetoDigital\Repositories\Roles as RolesRepository;

class Roles extends Facade
{
    protected static function getFacadeAccessor()
    {
        return RolesRepository::class;
    }
}
