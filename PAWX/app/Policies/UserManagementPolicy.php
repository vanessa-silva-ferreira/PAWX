<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Log;

class UserManagementPolicy
{
    use HandlesAuthorization;

    public function manageEmployees(User $user)
    {
        Log::debug("manage-employees", ['role' => $user->getRole(), 'ok' =>  $user->getRole() === 'admin']);

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

    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }
}
