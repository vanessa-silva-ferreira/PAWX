<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserManagementController extends Controller
{
    public function createAdmin()
    {
        return view('dashboards.admins.admin-create');
    }

    public function storeAdmin(Request $request)
    {
        return $this->createUser($request, 'admin');
    }

    public function createUser(StoreUserRequest $request, string $type)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        switch ($type) {
            case 'employee':
                $user->employee()->create([]);
                break;
            case 'client':
                $user->client()->create([]);
                break;
            default:
                return null; // or throw an exception
        }
        return $user;
    }

    public function createEmployee()
    {
        return view('dashboards.admin.employee-create.blade.php');
    }

    public function storeEmployee(Request $request)
    {
        return $this->createUser($request, 'employee');
    }

    public function createClient()
    {
        return view('dashboards.admin.create-client');
    }

    public function storeClient(Request $request)
    {
        return $this->createUser($request, 'client');
    }

    public function updateUser(UpdateUserRequest $request, string $type, int $id)
    {
        $user = User::findOrFail($id);

        $userData = $request->validated();

        if ($request->filled('password')) {
            $userData['password'] = Hash::make($request->password);
        }

        $user->update($userData);

        return $user;
    }


    public function buildType(string $prefix, string $type)
    {
        return $prefix . '-' . $type . 's';
    }
}
