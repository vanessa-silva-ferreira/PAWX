<?php

namespace App\Http\Controllers\Web\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateAppointmentRequest;
use App\Models\Appointment;
use App\Models\Employee;
use App\Models\Pet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;

class AppointmentController extends Controller
{
    /**
     * Display a listing of appointments related to the client's pets.
     */
    public function index()
    {
        if (Gate::denies('view', Appointment::class)) {
            abort(403, 'Unauthorized action.');
        }
        $appointments = Appointment::with(['pet', 'employee', 'pet.client'])
            ->orderBy('appointment_date', 'desc')
            ->paginate(10);

        return view('pages.client.appointments.index', compact('appointments'));
    }

    public function show($id)
    {
        if (Gate::denies('show', Appointment::class)) {
            abort(403, 'Unauthorized action.');
        }
        $appointment = Appointment::with(['pet', 'pet.client'])->findOrFail($id);

        return view('pages.client.appointments.show', compact('appointment'));
    }

    public function create(): View
    {
        if (Gate::denies('create', Appointment::class)) {
            abort(403, 'Unauthorized action.');
        }

        $pets = Pet::all();
        $employees = Employee::all();

        return view('pages.client.appointments.create', compact('pets', 'employees'));
    }

    public function store(Request $request)
    {
        if (Gate::denies('create', Appointment::class)) {
            abort(403, 'Unauthorized action.');
        }

        Gate::authorize('create', Appointment::class);

        Appointment::create($request->all());

        return redirect()->route('client.dashboard')
            ->with('success', 'Appointment created successfully!');
    }

    public function edit($appointmentId): View
    {
        $appointment = Appointment::findOrFail($appointmentId);

        if (Gate::denies('update', $appointment)) {
            abort(403, 'Unauthorized action.');
        }

        $pets = Pet::all();
        $employees = Employee::all();

        return view('pages.client.appointments.edit', compact('appointment', 'pets', 'employees'));
    }

    /**
     * Update the specified appointment in storage.
     */
    public function update(UpdateAppointmentRequest $request, $appointmentId)
    {
        $appointment = Appointment::findOrFail($appointmentId);

        if (Gate::denies('update', $appointment)) {
            abort(403, 'Unauthorized action.');
        }

        $appointment->update($request->validated());

        return redirect()->route('admin.appointments.index')
            ->with('success', 'Appointment updated successfully!');
    }

    public function cancel($id)
    {
        $appointment = Appointment::findOrFail($id);

        if (Gate::denies('cancel', $appointment)) {
            abort(403, 'Unauthorized action.');
        }

        $appointment->delete();

        return redirect()->route('client.appointments.index')
            ->with('success', 'Appointment canceled successfully!');
    }
}
