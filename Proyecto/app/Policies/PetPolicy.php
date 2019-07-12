<?php

namespace App\Policies;

use App\User;
use App\Pet;
use Illuminate\Auth\Access\HandlesAuthorization;

class PetPolicy
{
    use HandlesAuthorization;

    public function index(User $user)
    {
        return $user->has_permission('index-pet');
    }    
    /**
     * Determine whether the user can view any specialities.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the speciality.
     *
     * @param  \App\User  $user
     * @param  \App\Speciality  $speciality
     * @return mixed
     */
    public function view(User $user, Pet $pet)
    {
        return $user->has_permission('view-pet');
    }

    /**
     * Determine whether the user can create specialities.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->has_permission('create-pet');
    }

    /**
     * Determine whether the user can update the speciality.
     *
     * @param  \App\User  $user
     * @param  \App\Speciality  $speciality
     * @return mixed
     */
    public function update(User $user, Pet $pet)
    {
        return $user->has_permission('update-pet');
    }

    /**
     * Determine whether the user can delete the speciality.
     *
     * @param  \App\User  $user
     * @param  \App\Speciality  $speciality
     * @return mixed
     */
    public function delete(User $user, Pet $pet)
    {
        return $user->has_permission('delete-pet');
    }

    /**
     * Determine whether the user can restore the speciality.
     *
     * @param  \App\User  $user
     * @param  \App\Speciality  $speciality
     * @return mixed
     */
    public function restore(User $user, Pet $pet)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the speciality.
     *
     * @param  \App\User  $user
     * @param  \App\Speciality  $speciality
     * @return mixed
     */
    public function forceDelete(User $user, Pet $pet)
    {
        //
    }
}
