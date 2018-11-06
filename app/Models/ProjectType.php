<?php

namespace ProjetoDigital\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectType extends Model
{
    use ModelTrait;

    public $timestamps = false;

    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    public function documentTypes()
    {
        return $this->belongsToMany(DocumentType::class);
    }
}
