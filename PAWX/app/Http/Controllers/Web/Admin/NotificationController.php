<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
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

        return view('partials.dashboard.notification-bar', compact('appointments', 'date'));
    }
}
