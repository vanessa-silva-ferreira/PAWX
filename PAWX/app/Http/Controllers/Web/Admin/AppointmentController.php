<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAppointmentRequest;
use App\Http\Requests\UpdateAppointmentRequest;
use App\Models\Appointment;
use App\Models\Pet;
use App\Models\Client;
use App\Models\Employee;
use App\Models\Service;
use App\Traits\AppointmentValidationRules;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;

class AppointmentController extends Controller
{
    use AppointmentValidationRules;
    /**
     * Display a listing of appointments with pets and employees.
     */
    public function index()
    {
        if (Gate::denies('viewAny', Appointment::class)) {
            abort(403, 'Unauthorized action.');
        }
        $appointments = Appointment::with(['pet', 'employee', 'pet.client', 'service.name'])
            ->orderBy('appointment_date', 'desc')
            ->paginate(10);

        return view('pages.admin.appointments.index', compact('appointments'));
    }

    public function show($id)
    {
        if (Gate::denies('view', Appointment::class)) {
            abort(403, 'Unauthorized action.');
        }
        $appointment = Appointment::with(['pet', 'pet.client', 'employee.name', 'service.name'])->findOrFail($id);

        return view('pages.admin.appointments.show', compact('appointment'));
    }

    public function create(): View
    {
        if (Gate::denies('create', Appointment::class)) {
            abort(403, 'Unauthorized action.');
        }

        $pets = Pet::all();
        $employees = Employee::all();
        $clients = Client::with('pets')->get();
        $services = Service::all();

        // Include 'clients' in the compact array
        return view('pages.admin.appointments.create', compact('pets', 'employees', 'clients', 'services'));
    }

    public function store(StoreAppointmentRequest $request): \Illuminate\Http\RedirectResponse
    {
        if (Gate::denies('create', Appointment::class)) {
            abort(403, 'Unauthorized action.');
        }

        $appointmentData = $this->extractAppointmentData($request->all());
        Appointment::create($appointmentData);

        return redirect()->route('admin.dashboard')
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
        $services = Service::all();

        return view('pages.admin.appointments.edit', compact('appointment', 'pets', 'employees', 'services'));
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

    public function trashed(): View
    {
        if (Gate::denies('trashed', Appointment::class)) {
            abort(403, 'Unauthorized action.');
        }
        Gate::authorize('trashed', Appointment::class);

        $trashedAppointments = Appointment::onlyTrashed()
            ->with(['pet', 'pet.client', 'employee.name', 'service.name'])
            ->paginate(10);;
        return view('pages.admin.appointments.trashed', compact('trashedAppointments'));
    }

    public function restore($id)
    {
        $appointment = Appointment::withTrashed()->findOrFail($id);

        if (Gate::denies('restore', $appointment)) {
            abort(403, 'Unauthorized action.');
        }

        $appointment->restore();

        return redirect()->route('admin.appointments.trashed')
            ->with('success', 'Appointment restored successfully!');
    }


    public function cancel($id)
    {
        $appointment = Appointment::findOrFail($id);

        if (Gate::denies('cancel', $appointment)) {
            abort(403, 'Unauthorized action.');
        }

        $appointment->delete();

        return redirect()->route('admin.appointments.index')
            ->with('success', 'Appointment canceled successfully!');
    }

    public function forceDelete($id)
    {
        $appointment = Appointment::withTrashed()->findOrFail($id);
        if (Gate::denies('forceDelete', $appointment)) {
            abort(403, 'Unauthorized action.');
        }
        $appointment->forceDelete();
        return redirect()->route('admin.appointments.index')
            ->with('success', 'Appointment permanently deleted successfully!');
    }

}
