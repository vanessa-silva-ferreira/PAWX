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

        $search = $request->input('search');

        $query = Appointment::with(['pet', 'employee.user', 'service'])
            ->orderByDesc(
                Pet::selectRaw('MAX(id)')
                    ->whereColumn('appointments.pet_id', 'pets.id')
            );

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

        $appointments = $query->paginate(5);

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
            ->with('success', 'Marcação criada com sucesso!');
    }

    public function edit($appointmentId): View
    {
        $appointment = Appointment::with(['pet.client.user', 'service'])->findOrFail($appointmentId);

        if (Gate::denies('update', $appointment)) {
            abort(403, 'Unauthorized action.');
        }

        $pets = Pet::all();
        $employees = Employee::all();
        $services = Service::all();
        $clients = Client::with('user')->get();

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
            ->with('success', 'Marcação atualizada com sucesso!');
    }

    public function destroy($id)
    {
        $appointment = Appointment::findOrFail($id);

        $appointment->delete();

        return redirect()->route('admin.appointments.index')
            ->with('success', 'Marcação removida com sucesso.');
    }
}
