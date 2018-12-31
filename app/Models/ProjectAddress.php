<?php

namespace ProjetoDigital\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectAddress extends Model
{
    use ModelTrait;

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
