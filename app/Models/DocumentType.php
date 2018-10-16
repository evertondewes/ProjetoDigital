<?php

namespace ProjetoDigital\Models;

use Illuminate\Database\Eloquent\Model;

class DocumentType extends Model
{
    public function ProjectTypes()
    {
        return $this->belongsToMany(ProjectType::class);
    }
}
