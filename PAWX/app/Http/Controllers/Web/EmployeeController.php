<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class EmployeeController extends Controller
{
    protected $userManagement;


    public function __construct(UserManagementController $userManagement)
    {
        $this->userManagement = $userManagement;
    }

    public function dashboard()
    {
        return view('dashboards.employees.employee-dashboard');
    }

    /**
     * Display a listing of the resource.
     */
    public function index($type)
    {
        if (!Gate::allows('view-any-' . $type . 's')) {
            abort(403, 'Unauthorized action.');
        }
        $users = User::whereHas($type)->get();
        return view('dashboards.employees.user-index', ['users' => $users, 'type' => $type]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeUser(StoreUserRequest $request, $type)
    {
        if (!Gate::allows('manage-' . $type . 's')) {
            throw new AccessDeniedHttpException('Unauthorized action.');
        }

        $user = $this->userManagement->createUser($request, $type);

        if ($user instanceof User) {
            return redirect()->route('employee.dashboard')->with('success', ucfirst($type) . ' created successfully');
        }

        return back()->withErrors('Failed to create ' . $type);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createUser($type)
    {
        if (!Gate::allows('manage-' . $type . 's')) {
            abort(403, 'Unauthorized action.');
        }
        return view('dashboards.employees.employee-create', ['type' => $type]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        //
    }
}
