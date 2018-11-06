<?php

namespace ProjetoDigital\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProjectDocument extends Model
{
    use ModelTrait, SoftDeletes;

    protected $dates = ['deleted_at'];

    public function project()
    {
        return $this->belongsToMany(Project::class);
    }

    public static function analyze($project,$name,$approved)
    {
        $project->projectDocuments()->where('project_id', $project->id)
                ->where('name', $name)
                ->update(['approved' => $approved]);
    }
}

