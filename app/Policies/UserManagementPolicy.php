<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Log;

class UserManagementPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function manageEmployees(User $user)
    {
        return $user->getRole() === 'admin';
    }

    public function manageClients(User $user)
    {
        return in_array($user->getRole(), ['admin', 'employee']);
    }

    public function manageOwnAccount(User $user, User $targetUser)
    {
        return $user->id === $targetUser->id;
    }

    public function viewAnyEmployees(User $user)
    {
        return $user->getRole() === 'admin';
    }

    public function viewAnyClients(User $user)
    {
        return in_array($user->getRole(), ['admin', 'employee']);
    }
}
