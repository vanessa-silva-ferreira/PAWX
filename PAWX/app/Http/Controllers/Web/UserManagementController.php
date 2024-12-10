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
                return null;
        }
        return $user;
    }

    public function editUser()
    {
        $user = auth()->user();
        $role = $user->getRole();

        $viewPath = "pages.{$role}.edit";

        return view($viewPath, compact('user', 'role'));
    }

    public function updateUser(UpdateUserRequest $request)
    {
        $user = auth()->user();

        $userData = $request->validated();

        if ($request->filled('password')) {
            $userData['password'] = Hash::make($request->password);
        } else {
            unset($userData['password']);
        }

        $user->update($userData);

        return redirect()->route($user->getRole() . '.account.edit')->with('success', 'Conta atualizada com sucesso.');
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



    public function buildType(string $prefix, string $type)
    {
        return $prefix . '-' . $type . 's';
    }
}
