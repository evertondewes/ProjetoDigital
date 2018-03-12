<?php

namespace ProjetoDigital\Policies;

use ProjetoDigital\Models\User;
use ProjetoDigital\Models\EventDocument;
use Illuminate\Auth\Access\HandlesAuthorization;

class EventDocumentPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the eventDocument.
     *
     * @param  \ProjetoDigital\Models\User  $user
     * @param  \ProjetoDigital\Models\EventDocument  $eventDocument
     * @return mixed
     */
    public function view(User $user, EventDocument $eventDocument)
    {
        return $user->isBackendWorker() || $user->hasProject($eventDocument->event->project);
    }

    /**
     * Determine whether the user can delete the eventDocument.
     *
     * @param  \ProjetoDigital\Models\User  $user
     * @param  \ProjetoDigital\Models\EventDocument  $eventDocument
     * @return mixed
     */
    public function delete(User $user, EventDocument $eventDocument)
    {
        return $user->isBackendWorker() && $user->hasEvent($eventDocument->event);
    }
}
