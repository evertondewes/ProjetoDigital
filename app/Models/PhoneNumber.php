<?php

namespace ProjetoDigital\Models;

use Illuminate\Database\Eloquent\Model;

class PhoneNumber extends Model
{
    use ModelTrait;

    public $timestamps = false;

    public function person()
    {
        return $this->belongsTo(Person::class);
    }
}
