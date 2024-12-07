<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Pet;
use App\Models\Appointment;
use Carbon\Carbon;

//class DashboardController extends Controller
//{
//    public function index(Request $request): View {
//        $appointmentCount = Appointment::where('created_at', '>=', Carbon::now()->subDays(30))->count();
//        $petCount = Pet::where('created_at', '>=', Carbon::now()->subDays(30))->count();
//        $totalRevenue = Appointment::sum('total_price');
//
//        $search = $request->input('search');
//
//        // Fix: Only eager load the relationships, not specific attributes
//        $query = Appointment::with(['pet', 'employee', 'pet.client', 'service'])
//            ->orderBy('id', 'desc');
//
//        if ($search) {
//            $query->where(function ($q) use ($search) {
//                $q->where('appointment_date', 'like', "%$search%")
//                    ->orWhereHas('pet', fn($q) => $q->where('name', 'like', "%$search%"))
//                    ->orWhereHas('employee', fn($q) => $q->where('name', 'like', "%$search%"));
//            });
//        }
//
//        $appointments = $query->paginate(5);
//
//        return view('pages.admin.dashboard', compact('appointmentCount', 'totalRevenue', 'petCount', 'appointments'));
//    }
class DashboardController extends Controller
{
    public function index(Request $request): View {
        $appointmentCount = Appointment::where('created_at', '>=', Carbon::now()->subDays(30))->count();
        $petCount = Pet::where('created_at', '>=', Carbon::now()->subDays(30))->count();
        $totalRevenue = Appointment::sum('total_price');

        $search = $request->input('search');

        // Eager load relationships
        $query = Appointment::with(['pet.client.user', 'employee.user', 'service'])
            ->orderBy('id', 'desc');

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('appointment_date', 'like', "%$search%")
                    ->orWhereHas('pet', function ($q) use ($search) {
                        $q->where('name', 'like', "%$search%");
                    })
                    ->orWhereHas('pet.client.user', function ($q) use ($search) {
                        $q->where('name', 'like', "%$search%");
                    })
                    ->orWhereHas('employee.user', function ($q) use ($search) {
                        $q->where('name', 'like', "%$search%");
                    })
                    ->orWhereHas('service', function ($q) use ($search) {
                        $q->where('name', 'like', "%$search%");
                    });
            });
        }

        $appointments = $query->paginate(5);

        return view('pages.admin.dashboard', compact('appointmentCount', 'totalRevenue', 'petCount', 'appointments', 'search'));
    }


    public function getDashboardData(Request $request)
    {
        $days = $request->get('days', 30);
        $startDate = Carbon::now()->subDays($days);

        $appointmentCount = Appointment::where('created_at', '>=', $startDate)->count();
        $totalRevenue = Appointment::where('created_at', '>=', $startDate)->sum('total_price');
        $petCount = Pet::where('created_at', '>=', $startDate)->count();

        return response()->json([
            'appointmentCount' => $appointmentCount,
            'totalRevenue' => number_format($totalRevenue, 2),
            'petCount' => $petCount,
        ]);
    }


}
