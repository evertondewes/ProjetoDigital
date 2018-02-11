<?php

namespace ProjetoDigital\Models;

use ProjetoDigital\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, HasRoles;

    protected $guarded = [];

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
        $this->active = true;

        $this->save();
    }

    public function createdBy($id)
    {
        $this->created_by = $id;

        return $this;
    }
}
