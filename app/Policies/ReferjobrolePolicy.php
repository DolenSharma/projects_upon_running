<?php

namespace App\Policies;

use App\Models\Referjobrole;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ReferjobrolePolicy
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
        if($user->hasPermissionTo('View Referjobroles')){
            return true;
        }return false;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Referjobrole  $referjobrole
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Referjobrole $referjobrole)
    {
        if($user->hasPermissionTo('View Only Referjobroles')){
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
        if($user->hasPermissionTo('Create Referjobroles')){
            return true;
        }return false;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Referjobrole  $referjobrole
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Referjobrole $referjobrole)
    {
        if($user->hasPermissionTo('Update Referjobroles')){
            return true;
        }return false;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Referjobrole  $referjobrole
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Referjobrole $referjobrole)
    {
        if($user->hasPermissionTo('Delete Referjobroles')){
            return true;
        }return false;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Referjobrole  $referjobrole
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Referjobrole $referjobrole)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Referjobrole  $referjobrole
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Referjobrole $referjobrole)
    {
        //
    }
}
