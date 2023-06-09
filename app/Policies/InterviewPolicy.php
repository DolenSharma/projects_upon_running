<?php

namespace App\Policies;

use App\Models\Interview;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class InterviewPolicy
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
        if($user->hasPermissionTo('View Interviews')){
            return true;
        }return false;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Interview  $interview
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Interview $interview)
    {
        if($user->hasPermissionTo('View Only Interviews')){
            return true;
        }return false;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        if($user->hasPermissionTo('Create Interviews')){
            return true;
        }return false;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Interview  $interview
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Interview $interview)
    {
        if($user->hasPermissionTo('Update Interviews')){
            return true;
        }return false;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Interview  $interview
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Interview $interview)
    {
        if($user->hasPermissionTo('Delete Interviews')){
            return true;
        }return false;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Interview  $interview
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Interview $interview)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Interview  $interview
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Interview $interview)
    {
        //
    }
}
