<?php

namespace ProjetoDigital\Policies;

use ProjetoDigital\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the model.
     *
     * @param  \ProjetoDigital\Models\User $user
     * @param  \ProjetoDigital\Models\User  $model
     * @return mixed
     */
    public function view(User $user, User $model)
    {
        return $user->hasAnyRole('admin', 'secretario', 'engenheiro', 'estagiario');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \ProjetoDigital\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasAnyRole('admin', 'secretario');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \ProjetoDigital\Models\User  $user
     * @param  \ProjetoDigital\Models\User  $model
     * @return mixed
     */
    public function update(User $user, User $model)
    {
        return $user->hasAnyRole('admin', 'secretario');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \ProjetoDigital\Models\User  $user
     * @param  \ProjetoDigital\Models\User  $model
     * @return mixed
     */
    public function delete(User $user, User $model)
    {
        return $user->hasAnyRole('admin', 'secretario');
    }
}
