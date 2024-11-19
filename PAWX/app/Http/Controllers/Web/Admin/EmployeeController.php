<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEmployeeRequest;
use App\Models\User;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;

class EmployeeController extends Controller
{
    public function index(): View
    {
        $user = auth()->user();

        if (Gate::denies('view-any-employees')) {
            abort(403, 'Unauthorized action.');
        }

        if ($user->getRole() === 'admin') {
            $employees = User::whereHas('employee', function ($query) {
                $query->select('id', 'user_id');
            })
                ->with('employee')
                ->orderBy(Employee::select('id')->whereColumn('users.id', 'employees.user_id'))
                ->simplePaginate(5);

            return view('pages.admin.employees.index', compact('employees'));
        }

        abort(403, 'Unauthorized action.');
    }

    public function show($employeeId): View
    {
        $employee = Employee::findOrFail($employeeId);
        $user = $employee->user;

        if (Gate::denies('view-any-employees', $user)) {
            abort(403, 'Unauthorized action.');
        }

        if (!$employee) {
            abort(404, 'Employee not found.');
        }

        return view('pages.admin.employees.show', compact('employee'));
    }

    public function create()
    {
        if (Gate::denies('manage-employees')) {
            abort(403, 'Unauthorized action.');
        }
        return view('pages.admin.employees.create');
    }

    public function store(StoreEmployeeRequest $request)
    {
        if (Gate::denies('manage-employees')) {
            abort(403, 'Unauthorized action.');
        }

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);
//        \Log::info('Created User:', ['user' => $user]);
        $employee = Employee::create([
            'user_id' => $user->id,
        ]);
        return redirect()->route('admin.employees.index')
            ->with('success', 'Employee created successfully!');
    }
}