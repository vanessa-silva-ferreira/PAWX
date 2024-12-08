<?php

namespace App\Http\Controllers\Web\Admin;

use App\Exports\EmployeesExport;
use App\Http\Controllers\Controller;
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
}
