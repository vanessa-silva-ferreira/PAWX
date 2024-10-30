<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
                return null; // or throw an exception
        }
        return $user;
    }

    public function createAdmin()
    {
        return view('dashboards.admins.admin-create');
    }

    public function storeAdmin(Request $request)
    {
        return $this->createUser($request, 'admin');
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

    private function buildType(string $prefix, string $type)
    {
        return $prefix . '-' . $type . 's';
    }

}
