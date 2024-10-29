<?php

namespace App\Http\Controllers\Web\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Web\UserManagementController;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
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

        return redirect()->route('clients')->with('success', 'Registration successful!');
    }

    public function showRegistrationForm(){
        return view('auth.register');
    }
}
