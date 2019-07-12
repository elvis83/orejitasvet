<?php

namespace App\Policies;

use App\User;
use App\Insumo;
use Illuminate\Auth\Access\HandlesAuthorization;

class InsumoPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function index(User $user)
    {
        return $user->has_permission('index-insumo');
    }

    /**
     * Determine whether the user can view the permission.
     *
     * @param  \App\User  $user
     * @param  \App\Permission  $permission
     * @return mixed
     */
    public function view(User $user, Insumo $insumo)
    {
        return $user->has_permission('view-insumo');
    }

    /**
     * Determine whether the user can create permissions.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->has_permission('create-insumo');
    }

    /**
     * Determine whether the user can update the permission.
     *
     * @param  \App\User  $user
     * @param  \App\Permission  $permission
     * @return mixed
     */
    public function update(User $user, Insumo $insumo)
    {
        return $user->has_permission('update-insumo');
    }

    /**
     * Determine whether the user can delete the permission.
     *
     * @param  \App\User  $user
     * @param  \App\Permission  $permission
     * @return mixed
     */
    public function delete(User $user, Insumo $insumo)
    {
        return $user->has_permission('delete-insumo');
    }

    /**
     * Determine whether the user can restore the permission.
     *
     * @param  \App\User  $user
     * @param  \App\Permission  $permission
     * @return mixed
     */
    public function restore(User $user, Insumo $insumo)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the permission.
     *
     * @param  \App\User  $user
     * @param  \App\Permission  $permission
     * @return mixed
     */
    public function forceDelete(User $user, Insumo $insumo)
    {
        //
    }
}
