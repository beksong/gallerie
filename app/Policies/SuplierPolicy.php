<?php

namespace App\Policies;

use App\User;
use App\Suplier;
use Illuminate\Auth\Access\HandlesAuthorization;

class SuplierPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the suplier.
     *
     * @param  \App\User  $user
     * @param  \App\Suplier  $suplier
     * @return mixed
     */
    public function view(User $user, Suplier $suplier)
    {
        //
    }

    /**
     * Determine whether the user can create supliers.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the suplier.
     *
     * @param  \App\User  $user
     * @param  \App\Suplier  $suplier
     * @return mixed
     */
    public function update(User $user, Suplier $suplier)
    {
        //
    }

    /**
     * Determine whether the user can delete the suplier.
     *
     * @param  \App\User  $user
     * @param  \App\Suplier  $suplier
     * @return mixed
     */
    public function delete(User $user, Suplier $suplier)
    {
        //
    }
}
