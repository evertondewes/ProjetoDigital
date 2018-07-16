<?php

namespace ProjetoDigital\Models;

use ProjetoDigital\Facades\Roles;

trait HasRoles
{
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function isBackendWorker()
    {
        return $this->hasAnyRole('admin', 'secretario', 'engenheiro', 'estagiario');
    }

    public function isEngineer()
    {
        return $this->hasAnyRole('engenheiro', 'responsavel_tecnico');
    }

    public function isCustomer()
    {
        return $this->hasAnyRole('requerente', 'responsavel_tecnico');
    }

    public function isTechnicalManager()
    {
        return $this->hasAnyRole('responsavel_tecnico');
    }

    public function hasAnyRole($roles)
    {
        $roles = is_array($roles) ? $roles : func_get_args();

        return in_array($this->role->name, $roles);
    }

    public function scopeCustomer($query)
    {
        return $query->whereIn('role_id', Roles::id(['requerente', 'responsavel_tecnico']));
    }
}
