<?php

namespace App\Policies;

use App\Models\Idea;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class IdeaPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param User $user
     * @return Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param User $user
     * @param Idea $idea
     * @return Response|bool
     */
    public function view(User $user, Idea $idea)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param User $user
     * @return Response|bool
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param User $user
     * @param Idea $idea
     * @return Response|bool
     */
    public function update(User $user, Idea $idea)
    {
        return $user->id === (int) $idea->user_id
            && now()->subHour() <= $idea->created_at;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param User $user
     * @param Idea $idea
     * @return Response|bool
     */
    public function delete(User $user, Idea $idea)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param User $user
     * @param Idea $idea
     * @return Response|bool
     */
    public function restore(User $user, Idea $idea)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param User $user
     * @param Idea $idea
     * @return Response|bool
     */
    public function forceDelete(User $user, Idea $idea)
    {
        //
    }
}