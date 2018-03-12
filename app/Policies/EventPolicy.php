<?php

namespace ProjetoDigital\Policies;

use ProjetoDigital\Models\User;
use ProjetoDigital\Models\Event;
use Illuminate\Auth\Access\HandlesAuthorization;

class EventPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the event.
     *
     * @param  \ProjetoDigital\Models\User  $user
     * @param  \ProjetoDigital\Models\Event  $event
     * @return mixed
     */
    public function view(User $user, Event $event)
    {
        return $user->isBackendWorker() || $user->hasProject($event->project);
    }

    /**
     * Determine whether the user can update the event.
     *
     * @param  \ProjetoDigital\Models\User  $user
     * @param  \ProjetoDigital\Models\Event  $event
     * @return mixed
     */
    public function update(User $user, Event $event)
    {
        return $user->isBackendWorker() && $user->hasEvent($event);
    }
}
