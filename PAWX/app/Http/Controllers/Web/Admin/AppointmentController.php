<?php

namespace App\Http\Controllers\Web\Admin;

use Illuminate\Http\Request;
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
    public function index(Request $request): View
    {
        if (Gate::denies('viewAny', Appointment::class)) {
            abort(403, 'Unauthorized action.');
        }

        // Retrieve the search term (if any)
        $search = $request->input('search');

        // Build the base query
        $query = Appointment::with(['pet', 'employee.user', 'service'])
            ->orderByDesc(
                Pet::selectRaw('MAX(id)')
                    ->whereColumn('appointments.pet_id', 'pets.id')
            );

        // Fix: Only eager load the relationships, not specific attributes
        //$query = Appointment::with(['pet', 'employee', 'pet.client', 'service'])
        //    ->orderBy('id', 'desc');

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('appointment_date', 'like', "%$search%")
                    ->orWhereHas('pet', function ($subQuery) use ($search) {
                        $subQuery->where('name', 'like', "%$search%");
                    })
                    ->orWhereHas('service', function ($subQuery) use ($search) {
                        $subQuery->where('name', 'like', "%$search%");
                    })
                    ->orWhereHas('employee.user', function ($subQuery) use ($search) {
                        $subQuery->where('name', 'like', "%$search%")
                            ->orWhere('email', 'like', "%$search%");
                    });
            });
        }

        // Paginate the results
        $appointments = $query->simplePaginate(10);

        return view('pages.admin.appointments.index', compact('appointments'));
    }

    public function show($id)
    {
        $appointment = Appointment::with(['pet.client.user', 'employee', 'service'])->findOrFail($id);
        if (Gate::denies('view', $appointment)) {
            abort(403, 'Unauthorized action.');
        }


        return view('pages.admin.appointments.show', compact('appointment'));
    }

    public function create(): View
    {
        if (Gate::denies('create', Appointment::class)) {
            abort(403, 'Unauthorized action.');
        }

        $pets = Pet::all();
        $employees = Employee::with('user')->get();
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

        \Log::info('Form submitted', $request->all());

        return redirect()->route('admin.dashboard')
            ->with('success', 'Appointment created successfully!');
    }

    public function edit($appointmentId): View
    {
        $appointment = Appointment::with(['pet.client.user', 'service'])->findOrFail($appointmentId);

        // Authorization check
        if (Gate::denies('update', $appointment)) {
            abort(403, 'Unauthorized action.');
        }

        // Fetch related data
        $pets = Pet::all();
        $employees = Employee::all();
        $services = Service::all();
        $clients = Client::with('user')->get(); // Fetch all clients with their users

        return view('pages.admin.appointments.edit', compact('appointment', 'pets', 'employees', 'services', 'clients'));
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
