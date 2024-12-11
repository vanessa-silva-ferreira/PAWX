<?php

namespace App\Http\Controllers\Web\Client;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Pet;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View {
        $user = Auth::user();

        $pets = Pet::where('client_id', $user->client->id)
            ->paginate(10);

        return view('pages.client.dashboard', compact('pets'));
    }

    public function getDashboardData(Request $request)
    {
        $user = auth()->user()->load('client');

        if (!$user || !$user->client) {
            abort(403, 'Unauthorized action.');
        }

        $clientId = $user->client->id;

        $days = $request->get('days', 30);
        $startDate = Carbon::now()->subDays($days);

        $appointmentCount = Appointment::whereHas('pet', function ($query) use ($clientId) {
            $query->where('client_id', $clientId);
        })->where('created_at', '>=', $startDate)->count();

        $totalRevenue = Appointment::whereHas('pet', function ($query) use ($clientId) {
            $query->where('client_id', $clientId);
        })->where('created_at', '>=', $startDate)->sum('total_price');

        $petCount = Pet::where('client_id', $clientId)
            ->where('created_at', '>=', $startDate)
            ->count();

        return response()->json([
            'appointmentCount' => $appointmentCount,
            'totalRevenue' => number_format($totalRevenue, 2),
            'petCount' => $petCount,
        ]);
    }
}
