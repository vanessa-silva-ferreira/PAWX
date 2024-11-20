<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Pet;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;

class AppointmentController extends Controller
{
    /**
     * Display a listing of appointments with pets and employees.
     */
    public function index(): View
    {
        $user = auth()->user();

        if (Gate::denies('view-any-appointments')) {
            abort(403, 'Unauthorized action.');
        }

        // List all appointments with pets and employees for admin
        if ($user->getRole() === 'admin') {
            $appointments = Appointment::with(['pet', 'employee'])
                ->orderBy('appointment_date', 'desc')
                ->simplePaginate(10);

            return view('pages.admin.appointments.index', compact('appointments'));
        }

        abort(403, 'Unauthorized action.');
    }

    /**
     * Show details of a specific appointment.
     */
    public function show($appointmentId): View
    {
        $appointment = Appointment::with(['pet', 'employee'])->findOrFail($appointmentId);

        if (Gate::denies('view-appointment', $appointment)) {
            abort(403, 'Unauthorized action.');
        }

        return view('pages.admin.appointments.show', compact('appointment'));
    }

    /**
     * Show the form for creating a new appointment.
     */
    public function create(): View
    {
        if (Gate::denies('manage-appointments')) {
            abort(403, 'Unauthorized action.');
        }

        $pets = Pet::all(); // Retrieve all pets for dropdown
        $employees = Employee::all(); // Retrieve all employees for dropdown

        return view('pages.admin.appointments.create', compact('pets', 'employees'));
    }

    /**
     * Store a newly created appointment in storage.
     */
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

        return redirect()->route('admin.appointments.index')
            ->with('success', 'Appointment created successfully!');
    }

    /**
     * Show the form for editing an appointment.
     */
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

    /**
     * Soft delete (cancel) the specified appointment.
     */
    public function cancel($id)
    {
        $appointment = Appointment::findOrFail($id);

        if (Gate::denies('manage-appointments', $appointment)) {
            abort(403, 'Unauthorized action.');
        }

        $appointment->delete();

        return redirect()->route('employee.appointments.index')
            ->with('success', 'Appointment canceled successfully!');
    }

    public function trashed()
    {
        $appointments = Appointment::onlyTrashed()
            ->with(['pet', 'employee'])
            ->paginate(10);

        return view('pages.employee.appointments.trashed', compact('appointments'));
    }

    public function restore($id)
    {
        $appointment = Appointment::withTrashed()->findOrFail($id);

        if (Gate::denies('manage-appointments', $appointment)) {
            abort(403, 'Unauthorized action.');
        }

        $appointment->restore();

        return redirect()->route('employee.appointments.trashed')
            ->with('success', 'Appointment restored successfully!');
    }

}
