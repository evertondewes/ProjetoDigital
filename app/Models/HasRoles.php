<?php

namespace ProjetoDigital\Models;

use Illuminate\Support\Facades\DB;

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
        return $this->hasAnyRole('cliente', 'responsavel_tecnico');
    }

    public function hasAnyRole($roles)
    {
        $roles = is_array($roles) ? $roles : func_get_args();

        return in_array($this->role->name, $roles);
    }

    public function scopeCustomer($query)
    {
        $roles = DB::table('roles')
            ->where('name', 'responsavel_tecnico')
            ->orWhere('name', 'cliente')
            ->pluck('id')
            ->toArray();

        return $query->whereIn('role_id', $roles);
    }
}
