<?php

namespace App\Policies;

use App\Models\Appointment;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class AppointmentPolicy
{
    /**
     * Determine whether the user can view any models.
     */

    public function viewAny(User $user)
    {
        if ($user->isClient()) {
            return true;
        }
        if(in_array($user->getRole(), ['admin', 'employee'])){
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Appointment $appointment): bool
    {
        if(in_array($user->getRole(), ['admin', 'employee'])){
            return true;
        }
        return $user->getRole() === 'client' && $appointment->pet->client_id === $user->client->id;
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
    public function update(User $user, Appointment $appointment): bool
    {
        if ($user->hasRole('admin') || $user->hasRole('employee')) {
            return true;
        }
        return $appointment->pet->client_id === $user->client->id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function cancel(User $user, Appointment $appointment): bool
    {
        if ($user->hasRole('admin') || $user->hasRole('employee')) {
            return true;
        }
        return $appointment->pet->client_id === $user->client->id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Appointment $appointment): bool
    {
        return in_array($user->getRole(), ['admin', 'employee']);
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Appointment $appointment): bool
    {
        return $user->getRole() === 'admin';
    }

    /**
     * Determine whether the user can view trashed models.
     */
    public function trashed(User $user): bool
    {
        return in_array($user->getRole(), ['admin', 'employee']);
    }
}
