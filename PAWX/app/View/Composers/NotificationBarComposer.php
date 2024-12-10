<?php

namespace app\View\Composers;

use App\Models\Appointment;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class NotificationBarComposer
{
    public function compose(View $view)
    {
        $user = Auth::user();
        $date = now()->toDateString();
        $appointments = Appointment::with(['service'])
            ->whereDate('appointment_date', $date)
            ->orderBy('appointment_date', 'asc')
            ->get();

        $view->with(compact('appointments', 'date'));
    }
}
