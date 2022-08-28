<?php

namespace App\Policies;

use App\Models\Festa;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class FestaPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function before(User $user)
    {
        return $user->id == 1;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Festa  $festa
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Festa $festa)
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
        return $user->id == 2;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Festa  $festa
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Festa $festa)
    {
        return $user->id == 2;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Festa  $festa
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Festa $festa)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Festa  $festa
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Festa $festa)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Festa  $festa
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Festa $festa)
    {
        //
    }
}
