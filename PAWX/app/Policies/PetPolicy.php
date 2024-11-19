<?php

namespace App\Policies;

use App\Models\Pet;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PetPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return in_array($user->getRole(), ['admin', 'employee']);
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Pet $pet): bool
    {
        if (in_array($user->getRole(), ['admin', 'employee'])) {
            return true;
        }

        return $user->getRole() === 'client' && $pet->client_id === $user->client->id;
    }


    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return in_array($user->getRole(), ['admin', 'employee', 'client']);
    }

    /**
     * Determine whether the user can update the model.
     */

    public function update(User $user, Pet $pet): bool
    {
        if ($user->hasRole('admin') || $user->hasRole('employee')) {
            return true;
        }

        return $pet->client_id === $user->client->id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Pet $pet): bool
    {
        return $user->getRole() === 'admin';
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Pet $pet): bool
    {
        return $user->getRole() === 'admin';
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Pet $pet): bool
    {
        //
    }
}
