<?php

namespace ProjetoDigital\Policies;

use ProjetoDigital\Models\User;
use ProjetoDigital\Models\ProjectDocument;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProjectDocumentPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the projectDocument.
     *
     * @param  \ProjetoDigital\Models\User  $user
     * @param  \ProjetoDigital\Models\ProjectDocument  $projectDocument
     * @return mixed
     */
    public function view(User $user, ProjectDocument $projectDocument)
    {
        return $user->isBackendWorker() || $user->hasProject($projectDocument->project);
    }

    /**
     * Determine whether the user can delete the projectDocument.
     *
     * @param User $user
     * @param ProjectDocument $projectDocument
     * @return bool
     */
    public function delete(User $user, ProjectDocument $projectDocument)
    {
        return $user->isTechnicalManager() && $user->hasProject($projectDocument->project);
    }
}
