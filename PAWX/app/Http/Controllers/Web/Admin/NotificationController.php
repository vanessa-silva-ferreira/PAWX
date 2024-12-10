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

        $appointments = Appointment::with(['service'])
            ->whereDate('appointment_date', $date)
            ->orderBy('appointment_date', 'asc')
            ->get();

        return view('partials.dashboard.notification-list', compact('appointments', 'date'));
    }
}
