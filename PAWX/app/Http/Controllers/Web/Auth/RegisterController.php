<?php

namespace App\Http\Controllers\Web\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Web\UserManagementController;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Support\Facades\Auth;


class RegisterController extends Controller
{
    protected $userManagement;

    public function __construct(UserManagementController $userManagement)
    {
        $this->userManagement = $userManagement;
    }

    public function register(StoreUserRequest $request)
    {
        $user = $this->userManagement->createUser($request, 'client');
        Auth::login($user);

        return redirect()->route('client.dashboard')->with('success', 'Registado com sucesso!');
    }
}
