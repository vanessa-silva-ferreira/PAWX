<?php

namespace App\Exports;

use App\Models\FinancialReport;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class FinancialReportsExport implements FromQuery, WithMapping, WithHeadings, ShouldAutoSize
{
    protected $startDate;
    protected $endDate;

    public function __construct($startDate, $endDate)
    {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }

    public function query()
    {
        return FinancialReport::with([
            'appointment.service',
            'appointment.pet.client.user',
        ])->whereHas('appointment', function ($query) {
            $query->whereBetween('appointment_date', [$this->startDate, $this->endDate]);
        });
    }

    public function headings(): array
    {
        return [
            'ID',
            'Data da Marcação',
            'ID da Marcação',
            'Serviço',
            'Animal',
            'Cliente',
            'Custo do Serviço',
            'Preço Total',
            'Diferença',
        ];
    }

    public function map($report): array
    {
        return [
            $report->id,
            $report->appointment->appointment_date->format('d-m-Y'),
            $report->appointment->id,
            $report->appointment->service->name ?? 'N/A',
            $report->appointment->pet->name ?? 'N/A',
            $report->appointment->pet->client->user->name ?? 'N/A',
            number_format($report->appointment->service->cost ?? 0, 2, '.', ''),
            number_format($report->appointment->total_price ?? 0, 2, '.', ''),
            number_format($report->profit, 2, '.', ''),
        ];
    }
}
