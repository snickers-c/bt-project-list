<?php

namespace App\Policies;

use App\Models\Note;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class NotePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Note $note): bool
    {
        if ($note->status === 'published' || $note->status === 'archived') {
            return true;
        }

        return $note->user_id === $user->id;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Note $note): bool
    {
        return $note->user_id === $user->id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Note $note): bool
    {
        return $note->user_id === $user->id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Note $note): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Note $note): bool
    {
        return false;
    }

    public function stats(User $user): bool {
        return true;
    }

    public function archiveOldDrafts(User $user): bool {
        return true;
    }

    public function userCategories(User $user): bool {
        return true;
    }

    public function duplicate(User $user, Note $note): bool {
        return $note->user_id === $user->id;
    }

    public function publish(User $user, Note $note): bool {
        return $note->user_id === $user->id;
    }

    public function archive(User $user, Note $note): bool {
        return $note->user_id === $user->id;
    }

    public function pin(User $user, Note $note): bool {
        return $note->user_id === $user->id;
    }

    public function unpin(User $user, Note $note): bool {
        return $note->user_id === $user->id;
    }

    public function tasks(User $user, Note $note): bool {
        return $note->user_id === $user->id;
    }
}