<?php

namespace App\Http\Controllers\Web\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAppointmentRequest;
use App\Http\Requests\UpdateAppointmentRequest;
use App\Models\Appointment;
use App\Models\Employee;
use App\Models\Pet;
use App\Models\Service;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;

class AppointmentController extends Controller
{
    /**
     * Display a listing of appointments related to the client's pets.
     */
    public function index()
    {
        if (Gate::denies('viewAny', Appointment::class)) {
            abort(403, 'Unauthorized action.');
        }
        $user = auth()->user()->load('client');

        if (!$user || !$user->client) {
            abort(403, 'Unauthorized action.');
        }

        $client = $user->client;

//        $user = auth()->user();
//
//       if (isClient($user) {
//            // Load the client relationship if the user is a Client
//            $user->load('client');
//            $client = $user->client;
//        } else {
//            // Handle the case where the user is not a Client
//            abort(403, 'Unauthorized action.');
//        }

        $appointments = Appointment::with(['pet', 'employee', 'service.name'])
            ->whereHas('pet', function ($query) use($client) {
                $query->where('client_id', $client->id);
            })
            ->orderBy('appointment_date', 'desc')
            ->paginate(10);

        return view('client.appointments.index', compact('appointments'));
    }

    public function show($id)
    {
        if (Gate::denies('view', Appointment::class)) {
            abort(403, 'Unauthorized action.');
        }
        $appointment = Appointment::with(['pet', 'pet.client'. 'service.name'])->findOrFail($id);
        if ($appointment->pet->client_id !== auth()->user()->load('client')->client->id) {
            abort(403, 'Unauthorized action.');
        }

        return view('pages.client.appointments.show', compact('appointment'));
    }

    public function create(): View
    {
        if (Gate::denies('create', Appointment::class)) {
            abort(403, 'Unauthorized action.');
        }
        $user = auth()->user()->load('client');


        if (!$user || !$user->client) {
            abort(403, 'Unauthorized action.');
        }
        $client = $user->client;
        $pets = $client->pets;
        $services = Service::all();

        return view('pages.client.appointments.create', compact('pets' , 'client', 'services'));
    }

    public function store(StoreAppointmentRequest $request)
    {
        if (Gate::denies('create', Appointment::class)) {
            abort(403, 'Unauthorized action.');
        }

        Appointment::create($request->all());

        return redirect()->route('client.dashboard')
            ->with('success', 'Appointment created successfully!');
    }

    public function edit($appointmentId): View
    {
        $appointment = Appointment::findOrFail($appointmentId);

        $user = auth()->user()->load('client');

        if (Gate::denies('update', $appointment) || $appointment->pet->client_id !== $user->client->id) {
            abort(403, 'Unauthorized action.');
        }

        $pets = Pet::whereHas('client', function ($query) use ($user) {
            $query->where('id', $user->client->id);
        })->get();
        $employees = Employee::all();
        $services = Service::all();

        return view('pages.client.appointments.edit', compact('appointment', 'pets', 'employees', 'services'));
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

        return redirect()->route('client.appointments.index')
            ->with('success', 'Appointment updated successfully!');
    }

    public function cancel($id)
    {
        $appointment = Appointment::findOrFail($id);

        $user = auth()->user()->load('client');

        if (Gate::denies('cancel', $appointment) || $appointment->pet->client_id !== $user->client->id) {
            abort(403, 'Unauthorized action.');
        }

        $appointment->delete();

        return redirect()->route('client.appointments.index')
            ->with('success', 'Appointment canceled successfully!');
    }
}
