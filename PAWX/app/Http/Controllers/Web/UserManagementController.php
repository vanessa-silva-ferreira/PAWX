<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserManagementController extends Controller
{
    public function createUser(Request $request, string $type) {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required', // 'required|min:8'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user->save();

        switch ($type) {
            case 'admin':
                $user->admin()->create([]);
                break;
            case 'employee':
                $user->employee()->create([]);
                break;
            case 'client':
                $user->client()->create([]);
                break;
            default:
                return redirect()->back()->withErrors('Invalid user type');
        }
        //$user->client()->create();


        return $user; // Return the created user for potential reuse
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
        return view('dashboards.admin.create-employee');
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



}
