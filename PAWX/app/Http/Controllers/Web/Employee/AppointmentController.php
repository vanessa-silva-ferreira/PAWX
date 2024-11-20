<?php

namespace App\Http\Controllers\Web\Employee;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Employee;
use App\Models\Pet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;

class AppointmentController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        if ($user->getRole() !== 'employee') {
            abort(403, 'Unauthorized action.');
        }

        $appointments = Appointment::where('employee_id', $user->employee->id)
            ->with(['pet', 'pet.client'])
            ->orderBy('appointment_date', 'desc')
            ->paginate(10);

        return view('pages.employee.appointments.index', compact('appointments'));
    }

    public function show($id)
    {
        $appointment = Appointment::with(['pet', 'pet.client'])->findOrFail($id);
        $user = auth()->user();
        if ($user = auth()->user() && $user->getRole() !== 'employee') {
            abort(403, 'Unauthorized action.');
        }

        if ($appointment->employee_id !== $user->employee->id) {
            abort(403, 'Unauthorized action.');
        }

        return view('pages.employee.appointments.show', compact('appointment'));
    }

    public function create(): View
    {
        if (Gate::denies('manage-appointments')) {
            abort(403, 'Unauthorized action.');
        }

        $pets = Pet::all(); // Retrieve all pets for dropdown
        $employees = Employee::all(); // Retrieve all employees for dropdown

        return view('pages.employee.appointments.create', compact('pets', 'employees'));
    }

    public function store(Request $request)
    {
        if (Gate::denies('manage-appointments')) {
            abort(403, 'Unauthorized action.');
        }

        $validatedData = $request->validate([
            'pet_id' => 'required|exists:pets,id',
            'employee_id' => 'required|exists:employees,id',
            'appointment_date' => 'required|date|after:now',
            'status' => 'required|string|max:255',
            'total_price' => 'required|numeric|min:0',
        ]);

        Appointment::create($validatedData);

        return redirect()->route('employee.appointments.index')
            ->with('success', 'Appointment created successfully!');
    }

    public function edit($appointmentId): View
    {
        $appointment = Appointment::findOrFail($appointmentId);

        if (Gate::denies('manage-appointments', $appointment)) {
            abort(403, 'Unauthorized action.');
        }

        $pets = Pet::all(); // Retrieve all pets for dropdown
        $employees = Employee::all(); // Retrieve all employees for dropdown

        return view('pages.admin.appointments.edit', compact('appointment', 'pets', 'employees'));
    }

    /**
     * Update the specified appointment in storage.
     */
    public function update(Request $request, $appointmentId)
    {
        $appointment = Appointment::findOrFail($appointmentId);

        if (Gate::denies('manage-appointments', $appointment)) {
            abort(403, 'Unauthorized action.');
        }

        $validatedData = $request->validate([
            'pet_id' => 'required|exists:pets,id',
            'employee_id' => 'required|exists:employees,id',
            'appointment_date' => 'required|date|after:now',
            'status' => 'required|string|max:255',
            'total_price' => 'required|numeric|min:0',
        ]);

        $appointment->update($validatedData);

        return redirect()->route('admin.appointments.index')
            ->with('success', 'Appointment updated successfully!');
    }

    public function trashed(): View
    {
        $user = auth()->user();

        if ($user->getRole() !== 'employee') {
            abort(403, 'Unauthorized action.');
        }

        $appointments = Appointment::onlyTrashed()
            ->where('employee_id', $user->employee->id)
            ->with(['pet', 'pet.client'])
            ->paginate(10);

        return view('pages.employee.appointments.trashed', compact('appointments'));
    }

    public function restore($id)
    {
        $user = auth()->user();

        if ($user->getRole() !== 'employee') {
            abort(403, 'Unauthorized action.');
        }

        $appointment = Appointment::withTrashed()->findOrFail($id);

        if ($appointment->employee_id !== $user->employee->id) {
            abort(403, 'Unauthorized action.');
        }

        $appointment->restore();

        return redirect()->route('employee.appointments.trashed')
            ->with('success', 'Appointment restored successfully!');
    }

    public function cancel($id)
    {
        $user = auth()->user();

        if ($user->getRole() !== 'employee') {
            abort(403, 'Unauthorized action.');
        }

        $appointment = Appointment::findOrFail($id);

        if ($appointment->employee_id !== $user->employee->id) {
            abort(403, 'Unauthorized action.');
        }

        $appointment->delete();

        return redirect()->route('employee.appointments.index')
            ->with('success', 'Appointment canceled successfully!');
    }
}
