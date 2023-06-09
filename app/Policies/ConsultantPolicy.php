<?php

namespace App\Policies;

use App\Models\Consultant;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ConsultantPolicy
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
        if($user->hasPermissionTo('View Consultants')){
            return true;
        }return false;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Consultant  $consultant
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Consultant $consultant)
    {
        if($user->hasPermissionTo('View Only Consultants')){
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
        if($user->hasPermissionTo('Create Consultants')){
            return true;
        }return false;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Consultant  $consultant
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Consultant $consultant)
    {
        if($user->hasPermissionTo('Update Consultants')){
            return true;
        }return false;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Consultant  $consultant
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Consultant $consultant)
    {
        if($user->hasPermissionTo('Delete Consultants')){
            return true;
        }return false;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Consultant  $consultant
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Consultant $consultant)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Consultant  $consultant
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Consultant $consultant)
    {
        //
    }
}
