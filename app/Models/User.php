<?php

namespace ProjetoDigital\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $guarded = [];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function person()
    {
        return $this->belongsTo(Person::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function getRouteKeyName()
    {
        return 'username';
    }

    public function isBackendWorker()
    {
        return $this->hasAnyRole('admin', 'secretario', 'engenheiro', 'estagiario');
    }

    public function isCustomer()
    {
        return $this->hasAnyRole('cliente', 'engenheiro-cliente');
    }

    public function hasAnyRole($roles)
    {
        $roles = is_array($roles) ? $roles : func_get_args();

        return in_array($this->role->name, $roles);
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
}
