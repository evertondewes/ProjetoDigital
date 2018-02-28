<?php

namespace ProjetoDigital\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use ModelTrait;

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
