<?php

namespace App\Http\Controllers\Web;

use App\Exports\PetsExport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function exportPets(Request $request)
    {
        $user = auth()->user();
        $role = $user->getRole();

        $fileName = 'pets_' . now()->format('Y_m_d_H_i_s') . '.xlsx';

        return Excel::download(new PetsExport($user, $role), $fileName);
    }
}
