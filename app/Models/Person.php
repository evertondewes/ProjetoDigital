<?php

namespace ProjetoDigital\Models;

class Person extends Model
{
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
