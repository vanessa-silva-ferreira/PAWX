<?php

namespace App\Http\Controllers\Web;


use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class AdminController extends Controller
{
    protected $userManagement;

    public function __construct(UserManagementController $userManagement)
    {
        $this->userManagement = $userManagement;
    }

    public function dashboard()
    {
//        return view('dashboards.admins.admin-dashboard');
        return view('dashboards.admins.index');
    }

    /**
     * Display a listing of the resource.
     */
//    public function index($type)
//    {
//        //if (!Gate::allows($this->buildType('view-any-', $type))) {
//        if (!Gate::allows('view-any-' . $type . 's')) {
//            abort(403, 'Unauthorized action.');
//        }
//        $users = User::whereHas($type)->get();
//        return view('dashboards.admins.index', ['users' => $users->users, 'type' => $type]);
//    }


    public function index($type)
    {
        if (!Gate::allows('view-any-' . $type . 's')) {
            abort(403, 'Unauthorized action.');
        }

        $users = User::whereHas($type, function($query) {
            $query->select('id', 'user_id');
        })->with($type)->get();

        $users = $users->map(function ($user) use ($type) {
            $typeModel = $user->$type;
            return [
                'id' => $typeModel->id,
                'name' => $user->name,
                'username' => $user->username,
                'email' => $user->email,
                'address' => $user->address,
                'phone_number' => $user->phone_number,
                'nif' => $user->nif,
            ];
        });

        return view('dashboards.admins.index', ['users' => $users, 'type' => $type]);
    }


    public function storeUser(StoreUserRequest $request, $type)
    {
        if (!Gate::allows('manage-' . $type . 's')) {
            throw new AccessDeniedHttpException('Unauthorized action.');
        }

        $user = $this->userManagement->createUser($request, $type);

        if ($user instanceof User) {
            return redirect()->route('admin.dashboard')->with('success', ucfirst($type) . ' created successfully');
        }

        return back()->withErrors('Failed to create ' . $type);
    }

    public function editUser($type, $id)
    {
        if (!Gate::allows('manage-' . $type . 's')) {
            abort(403, 'Unauthorized action.');
        }

        $user = User::resolveFromType($type, $id);

        return view('dashboards.admins.edit', [
            'type' => $type,
            'user' => $user->user
        ]);
    }


    public function updateUser(UpdateUserRequest $request, $type, $id)
    {
//        dd('here');

        if (!Gate::allows('manage-' . $type . 's')) {
            throw new AccessDeniedHttpException('Unauthorized action.');
        }

        $user = $this->userManagement->updateUser($request, $id);

        if ($user) {
            return redirect()->route('admin.dashboard')->with('success', ucfirst($type) . ' updated successfully');
        }

        return back()->withErrors('Failed to create ' . $type);
    }

    public function createUser($type)
    {
        if (!Gate::allows('manage-' . $type . 's')) {
            abort(403, 'Unauthorized action.');
        }
        return view('dashboards.admins.create', ['type' => $type]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
//    public function create()
//    {
//        $this->authorize('manage-employees');
//        return $this->userManagement->createAdmin();
//    }
//
//    /**
//     * Store a newly created resource in storage.
//     */
//    public function store(StoreAdminRequest $request)
//    {
//        $this->authorize('manage-employees');
//
//        $user = $this->userManagement->createUser($request, 'admin');
//
//        if ($user instanceof User) {
//            return redirect()->route('admin.dashboard')->with('success', 'Admin created successfully');
//        }
//        return $user;
//    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAdminRequest $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin)
    {
        //
    }

    private function buildType(string $prefix, string $type)
    {
        return $prefix . '-' . $type . 's';
    }
}
