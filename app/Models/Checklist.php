<?php

namespace ProjetoDigital\Models;

use Illuminate\Database\Eloquent\Model;

class Checklist extends Model
{
    use ModelTrait;
    
    public $timestamps = false;

    public function projectType()
    {
        return $this->belongsTo(ProjectType::class);
    }

    public function documentTypes()
    {
        return $this->hasMany(DocumentType::class);
    }
}
