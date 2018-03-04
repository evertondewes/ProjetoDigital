<?php

namespace ProjetoDigital\Policies;

use ProjetoDigital\Models\User;
use ProjetoDigital\Models\Project;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProjectPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the project.
     *
     * @param  \ProjetoDigital\Models\User  $user
     * @param  \ProjetoDigital\Models\Project  $project
     * @return mixed
     */
    public function view(User $user, Project $project)
    {
        return $user->hasAnyRole('cliente', 'responsavel_tecnico') &&
            $user->hasProject($project);
    }

    /**
     * Determine whether the user can create projects.
     *
     * @param  \ProjetoDigital\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasAnyRole('responsavel_tecnico');
    }

    /**
     * Determine whether the user can update the project.
     *
     * @param  \ProjetoDigital\Models\User  $user
     * @param  \ProjetoDigital\Models\Project  $project
     * @return mixed
     */
    public function update(User $user, Project $project)
    {
        return $user->hasAnyRole('responsavel_tecnico') &&
            $user->hasProject($project);
    }

    /**
     * Determine whether the user can delete the project.
     *
     * @param  \ProjetoDigital\Models\User  $user
     * @param  \ProjetoDigital\Models\Project  $project
     * @return mixed
     */
    public function delete(User $user, Project $project)
    {
        return $user->hasAnyRole('responsavel_tecnico') &&
            $user->hasProject($project);
    }
}
