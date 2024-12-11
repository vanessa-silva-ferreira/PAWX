<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Models\FinancialReport;
use Illuminate\Http\Request;

class FinancialReportController extends Controller
{
    public function index(Request $request)
    {
        $startDate = $request->query('start_date');
        $endDate = $request->query('end_date');
        $month = $request->query('month');

        $query = FinancialReport::with(['appointment.service', 'appointment']);

        if ($startDate && $endDate) {
            $query->whereHas('appointment', function ($q) use ($startDate, $endDate) {
                $q->whereBetween('appointment_date', [$startDate, $endDate]);
            });
        }

        if ($month) {
            $query->whereHas('appointment', function ($q) use ($month) {
                $q->whereMonth('appointment_date', '=', date('m', strtotime($month)))
                    ->whereYear('appointment_date', '=', date('Y', strtotime($month)));
            });
        }

        $financialReports = $query->paginate(5);

        return view('pages.admin.financial-reports', compact('financialReports', 'startDate', 'endDate', 'month'));
    }
}
