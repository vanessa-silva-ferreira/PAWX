<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use App\Models\Employee;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;

class EmployeeController extends Controller
{
    public function index()
    {
        Gate::authorize('view-any-employees');

        $employees = User::whereHas('employee')
            ->with('employee')
            ->orderByDesc(Employee::select('id')->whereColumn('users.id', 'employees.user_id'))
            ->simplePaginate(5);

        return view('pages.admin.employees.index', compact('employees'));
    }

    public function show($employeeId): View
    {
        $employee = Employee::with('user')->findOrFail($employeeId);

        Gate::authorize('view-any-employees', $employee->user);

        return view('pages.admin.employees.show', compact('employee'));
    }

    public function create()
    {
        Gate::authorize('manage-employees');

        return view('pages.admin.employees.create');
    }

    public function store(StoreUserRequest $request)
    {
        $userData = $request->validated();
        $userData['password'] = bcrypt($userData['password']);

        $user = User::create($userData);
        Employee::create([
            'user_id' => $user->id,
        ]);

        return redirect()->route('admin.employees.index')->with('success', 'Colaborador criado com sucesso.');
    }

    public function edit($id)
    {
        $employee = Employee::with('user')->findOrFail($id);

        Gate::authorize('manage-employees');

        return view('pages.admin.employees.edit', compact('employee'));
    }

    public function update(UpdateUserRequest $request, $id)
    {
        $employee = Employee::with('user')->findOrFail($id);

        Gate::authorize('manage-employees');

        $userData = $request->validated();

        if (!empty($userData['password'])) {
            $userData['password'] = bcrypt($userData['password']);
        } else {
            unset($userData['password']);
        }

        $employee->user->update($userData);

        return redirect()->route('admin.employees.show', $employee->id)
            ->with('success', 'Colaborador atualizado com sucesso.');
    }

    public function destroy($id)
    {
        $employee = Employee::with('user')->findOrFail($id);

        Gate::authorize('manage-employees');

        $employee->user->delete();

        return redirect()->route('admin.employees.index')
            ->with('success', 'Colaborador removido com sucesso.');
    }
    public function trashed()
    {
        $employees = Employee::onlyTrashed()->with('user')->paginate(5);
        return view('pages.admin.employees.trashed', compact('employees'));
    }

    public function restore($id)
    {
        $employee = Employee::withTrashed()->with('user')->findOrFail($id);

        Gate::authorize('manage-employees');

        $employee->user->restore();

        return redirect()->route('admin.employees.trashed')
            ->with('success', 'Colaborador restaurado com sucesso.');
    }

    public function forceDelete($id)
    {
        $employee = Employee::withTrashed()->with('user')->findOrFail($id);

        Gate::authorize('manage-employees');

        $employee->user->forceDelete();

        return redirect()->route('admin.employees.trashed')
            ->with('success', 'Colaborador removido permanentemente.');
    }
}