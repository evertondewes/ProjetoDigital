<?php

namespace ProjetoDigital\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use ModelTrait;

    public function person()
    {
        return $this->belongsTo(Person::class);
    }
}
