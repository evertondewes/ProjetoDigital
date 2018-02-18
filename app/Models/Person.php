<?php

namespace ProjetoDigital\Models;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use ModelTrait;

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function phoneNumbers()
    {
        return $this->hasMany(PhoneNumber::class);
    }
}
