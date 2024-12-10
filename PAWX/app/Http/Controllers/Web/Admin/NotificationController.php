<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function getAppointmentsByDate(Request $request)
    {
        $date = $request->input('date', now()->toDateString());

        $appointments = Appointment::with(['service', 'pet.client.user', 'pet.breed.species'])
            ->whereDate('appointment_date', $date)
            ->orderBy('appointment_date', 'asc')
            ->get();


        return response()->json([
            'notifications' => $appointments->map(function ($appointment) {
                return [
                    'id' => $appointment->id,
                    'service' => $appointment->service->name,
                    'pet' => [
                        'name' => $appointment->pet->name,
                        'size' => $appointment->pet->size->category ?? null,
                        'breed' => $appointment->pet->breed->name ?? null,
                        'fur_type' => $appointment->pet->breed->fur_type ?? null,
                        'species' => $appointment->pet->breed->species->name ?? null,
                    ],
                    'client' => $appointment->pet->client->user->name,
                    'status_html' => view('components.utilities.appointment-status-tag', ['status' => $appointment->status])->render(),
                    'appointment_date' => $appointment->appointment_date->format('Y-m-d H:i:s'),
                    ];
            }),
        ]);
    }


    public function getAppointmentsByMonth(Request $request)
    {
        $year = $request->input('year');
        $month = $request->input('month');

        $startOfMonth = now()->create($year, $month, 1)->startOfMonth();
        $endOfMonth = $startOfMonth->copy()->endOfMonth();

        $appointments = Appointment::whereBetween('appointment_date', [$startOfMonth, $endOfMonth])
            ->get()
            ->groupBy(function ($appointment) {
                return $appointment->appointment_date->toDateString();
            });

        $appointmentDays = $appointments->mapWithKeys(function ($appointments, $date) {
            return [$date => true];
        });

        return response()->json(['appointments' => $appointmentDays]);
    }


}
