<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Venta;

class VentaPolicy
{
    /**
     * Determine whether the user can view the venta.
     */
    public function view(User $user, Venta $venta): bool
    {
        return $user->id === $venta->user_id;
    }

    /**
     * Determine whether the user can update the venta.
     */
    public function update(User $user, Venta $venta): bool
    {
        return $user->id === $venta->user_id;
    }

    /**
     * Determine whether the user can delete the venta.
     */
    public function delete(User $user, Venta $venta): bool
    {
        return $user->id === $venta->user_id;
    }
}
