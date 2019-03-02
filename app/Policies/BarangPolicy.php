<?php

namespace App\Policies;

use App\User;
use App\Barang;
use Illuminate\Auth\Access\HandlesAuthorization;

class BarangPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the barang.
     *
     * @param  \App\User  $user
     * @param  \App\Barang  $barang
     * @return mixed
     */
    public function view(User $user, Barang $barang)
    {
        //
    }

    /**
     * Determine whether the user can create barangs.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the barang.
     *
     * @param  \App\User  $user
     * @param  \App\Barang  $barang
     * @return mixed
     */
    public function update(User $user, Barang $barang)
    {
        //
    }

    /**
     * Determine whether the user can delete the barang.
     *
     * @param  \App\User  $user
     * @param  \App\Barang  $barang
     * @return mixed
     */
    public function delete(User $user, Barang $barang)
    {
        //
    }
}
