<?php

namespace App\Exports;

use App\Models\Service;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ServicesExport implements FromQuery, WithMapping, WithHeadings, ShouldAutoSize
{
    public function query()
    {
        return Service::query();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nome',
            'Observações',
            'Preço',
            'Custo',
        ];
    }

    public function map($service): array
    {
        return [
            $service->id,
            $service->name ?? 'N/A',
            $service->obs ?? 'N/A',
            number_format($service->price, 2, ',', '.') ?? 'N/A',
            number_format($service->cost, 2, ',', '.') ?? 'N/A',
        ];
    }
}
