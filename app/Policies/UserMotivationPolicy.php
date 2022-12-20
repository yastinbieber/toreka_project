<?php

namespace App\Policies;

use App\Models\User;
use App\Models\UserMotivation;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserMotivationPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\UserMotivation  $userMotivation
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, UserMotivation $userMotivation)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\UserMotivation  $userMotivation
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, UserMotivation $userMotivation)
    {
        return $user->id === $userMotivation->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\UserMotivation  $userMotivation
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, UserMotivation $userMotivation)
    {
        return $user->id === $userMotivation->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\UserMotivation  $userMotivation
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, UserMotivation $userMotivation)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\UserMotivation  $userMotivation
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, UserMotivation $userMotivation)
    {
        //
    }
}
