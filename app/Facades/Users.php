<?php

namespace ProjetoDigital\Facades;

use Illuminate\Support\Facades\Facade;
use ProjetoDigital\Repositories\Users as UsersRepository;

class Users extends Facade
{
    protected static function getFacadeAccessor()
    {
        return UsersRepository::class;
    }
}
