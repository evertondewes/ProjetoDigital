<?php

namespace ProjetoDigital\Policies;

use ProjetoDigital\Models\User;
use ProjetoDigital\Models\Person;
use Illuminate\Auth\Access\HandlesAuthorization;

class PersonPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the person.
     *
     * @param  \ProjetoDigital\Models\User  $user
     * @param  \ProjetoDigital\Models\Person  $person
     * @return mixed
     */
    public function view(User $user, Person $person)
    {
        return $user->hasAnyRole('admin', 'secretario', 'engenheiro', 'estagiario');
    }
}
