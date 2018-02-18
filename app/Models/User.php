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
        $this->active = true;

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
}
