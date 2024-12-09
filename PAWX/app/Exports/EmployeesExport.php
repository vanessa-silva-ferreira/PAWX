<?php

namespace App\Exports;

use App\Models\Employee;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class EmployeesExport implements FromQuery, WithMapping, WithHeadings, ShouldAutoSize
{
    public function query()
    {
        return Employee::with('user');
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nome',
            'Email',
            'Telefone',
            'NIF',
            'Endereço',
        ];
    }

    public function map($employee): array
    {
        return [
            $employee->id,
            $employee->user->name ?? 'N/A',
            $employee->user->email ?? 'N/A',
            $employee->user->phone_number ?? 'N/A',
            $employee->user->nif ?? 'N/A',
            $employee->user->address ?? 'N/A',
        ];
    }
}
