<?php

namespace App\Http\Controllers\Web\Admin;

use App\Exports\FinancialReportsExport;
use App\Exports\ServicesExport;
use App\Exports\EmployeesExport;
use App\Http\Controllers\Controller;
use App\Models\FinancialReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function exportEmployees()
    {
        Gate::authorize('view-any-employees');

        $fileName = 'employees_' . now()->format('Y_m_d_H_i_s') . '.xlsx';
        return Excel::download(new EmployeesExport(), $fileName);
    }

    public function exportServices()
    {
        Gate::authorize('viewAny', Service::class);

        $fileName = 'services_' . now()->format('Y_m_d_H_i_s') . '.xlsx';

        return Excel::download(new ServicesExport(), $fileName);
    }

    public function exportFinancialReports(Request $request)
    {
        Gate::authorize('viewAny', FinancialReport::class);

        $startDate = $request->query('start_date', now()->subMonth()->startOfMonth()->toDateString());
        $endDate = $request->query('end_date', now()->subMonth()->endOfMonth()->toDateString());

        $fileName = 'financial_reports_' . now()->format('Y_m_d_H_i_s') . '.xlsx';

        return Excel::download(new FinancialReportsExport($startDate, $endDate), $fileName);
    }

}
