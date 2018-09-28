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

    public static function createEvent($project,$event_type_id,$user_id,$obs) 
    {
        return $project->events()->create([
            'obs' => $obs,
            'event_type_id' => $event_type_id,
            'project_id' => $project->id,
            'user_id' => $user_id,
          //  'created_by' => $user_id
        ]);    
    }
}
