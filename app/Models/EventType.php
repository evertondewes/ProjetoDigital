<?php

namespace ProjetoDigital\Models;

use Illuminate\Database\Eloquent\Model;

class EventType extends Model
{
    public function events()
    {
        return $this->hasMany(Event::class);
    }
}
