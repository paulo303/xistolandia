<?php

namespace App\Policies;

use App\Models\Festa;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class FestaPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        //
    }

    public function view(User $user, Festa $festa)
    {
        //
    }

    public function create(User $user)
    {
        //
    }

    public function update(User $user, Festa $festa)
    {
        //
    }

    public function delete(User $user, Festa $festa)
    {
        //
    }

    public function restore(User $user, Festa $festa)
    {
        //
    }

    public function forceDelete(User $user, Festa $festa)
    {
        //
    }
}
