<?php

namespace App\Http\Controllers\Web\Client;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Pet;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    /**
     * Display a listing of appointments related to the client's pets.
     */
    public function index()
    {
        $client = auth()->user()->client();

        $appointments = Appointment::with(['pet', 'employee'])
            ->whereHas('pet', function ($query) use ($client) {
                $query->where('client_id', $client->id);
            })
            ->orderBy('appointment_date', 'desc')
            ->simplePaginate(10);

        return view('pages.client.appointments.index', compact('appointments'));
    }

    /**
     * Show the details of a specific appointment.
     */
    public function show($id)
    {
        $appointment = Appointment::with(['pet', 'employee'])->findOrFail($id);

        if ($appointment->pet->client_id !== auth()->user()->client->id) {
            abort(403, 'Unauthorized action.');
        }

        return view('pages.client.appointments.show', compact('appointment'));
    }

    /**
     * Show the form for creating a new appointment.
     */
    public function create()
    {
        $client = auth()->user()->client;
        $pets = $client->pets; // Obter todos os pets associados ao cliente

        return view('pages.client.appointments.create', compact('pets'));
    }

    /**
     * Store a newly created appointment in storage.
     */
    public function store(Request $request)
    {
        $client = auth()->user()->client;

        $validatedData = $request->validate([
            'pet_id' => 'required|exists:pets,id',
            'appointment_date' => 'required|date|after:now',
            'status' => 'required|string|max:255',
            'total_price' => 'required|numeric|min:0',
        ]);

        // Garantir que o pet pertence ao cliente
        if (!in_array($validatedData['pet_id'], $client->pets->pluck('id')->toArray())) {
            abort(403, 'Unauthorized action.');
        }

        Appointment::create($validatedData);

        return redirect()->route('client.appointments.index')
            ->with('success', 'Appointment created successfully!');
    }

    /**
     * Show the form for editing an appointment.
     */
    public function edit($id)
    {
        $appointment = Appointment::findOrFail($id);

        if ($appointment->pet->client_id !== auth()->user()->client->id) {
            abort(403, 'Unauthorized action.');
        }

        return view('pages.client.appointments.edit', compact('appointment'));
    }

    /**
     * Update the specified appointment in storage.
     */
    public function update(Request $request, $id)
    {
        $appointment = Appointment::findOrFail($id);

        if ($appointment->pet->client_id !== auth()->user()->client->id) {
            abort(403, 'Unauthorized action.');
        }

        $validatedData = $request->validate([
            'appointment_date' => 'required|date|after:now',
            'status' => 'required|string|max:255',
            'total_price' => 'required|numeric|min:0',
        ]);

        $appointment->update($validatedData);

        return redirect()->route('client.appointments.index')
            ->with('success', 'Appointment updated successfully!');
    }

    /**
     * Cancel an appointment (soft delete).
     */
    public function cancel($id)
    {
        $appointment = Appointment::findOrFail($id);

        if ($appointment->pet->client_id !== auth()->user()->client->id) {
            abort(403, 'Unauthorized action.');
        }

        $appointment->delete();

        return redirect()->route('client.appointments.index')
            ->with('success', 'Appointment canceled successfully!');
    }
}
