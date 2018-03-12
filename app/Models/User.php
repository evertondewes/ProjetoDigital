<?php

namespace ProjetoDigital\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, HasRoles, ModelTrait;

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function person()
    {
        return $this->belongsTo(Person::class);
    }

    public function isActive()
    {
        return $this->active;
    }

    public function activate()
    {
        return $this->setActive(true);
    }

    public function deactivate()
    {
        return $this->setActive(false);
    }

    public function setActive($active)
    {
        $this->active = (bool) $active;

        $this->save();

        return $this;
    }

    public function email($email)
    {
        $this->email = $email;

        return $this;
    }

    public function createdBy($id)
    {
        $this->created_by = $id;

        return $this;
    }

    public function deletedBy($id)
    {
        $this->deleted_by = $id;

        return $this;
    }

    public function projects()
    {
        return $this->belongsToMany(Project::class);
    }

    public function scopePending($query)
    {
        return $query->customer()
            ->where('active', false)
            ->whereNotNull('person_id')
            ->whereNull('created_by');
    }

    public function hasProject(Project $project)
    {
        if ($this->isTechnicalManager()) {
            return in_array($this->id, $project->users->pluck('id')->all());
        }

        return in_array($this->person->id, $project->people->pluck('id')->all());
    }

    public function hasEvent(Event $event)
    {
        return $this->id === $event->user_id;
    }

    public function events()
    {
        return $this->hasMany(Event::class);
    }
}
