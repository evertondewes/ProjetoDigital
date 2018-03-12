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

    public function eventType()
    {
        return $this->belongsTo(EventType::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function eventDocuments()
    {
        return $this->hasMany(EventDocument::class);
    }
}
