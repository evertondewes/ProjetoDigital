<?php

namespace ProjetoDigital\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use ModelTrait;

    protected $table = 'status';

    public $timestamps = false;

    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}
