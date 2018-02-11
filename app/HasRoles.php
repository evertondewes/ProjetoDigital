<?php

namespace ProjetoDigital;

use ProjetoDigital\Models\Role;
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

    public function isCustomer()
    {
        return $this->hasAnyRole('cliente', 'engenheiro-cliente');
    }

    public function hasAnyRole($roles)
    {
        $roles = is_array($roles) ? $roles : func_get_args();

        return in_array($this->role->name, $roles);
    }

    public function scopeCustomer($query)
    {
        $roles = DB::table('roles')
            ->where('name', 'engenheiro-cliente')
            ->orWhere('name', 'cliente')
            ->pluck('id')
            ->toArray();

        return $query->whereIn('role_id', $roles);
    }
}
