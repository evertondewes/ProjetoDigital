<?php

namespace ProjetoDigital\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use ModelTrait;

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
