<?php

namespace App\Exports;

use App\Models\Appointment;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;


class AppointmentsExport implements FromQuery, WithMapping, WithHeadings, ShouldAutoSize
{
    protected $user;
    protected $role;

    public function __construct($user, $role)
    {
        $this->user = $user;
        $this->role = $role;
    }

    public function query()
    {
        $query = Appointment::with([
            'pet.client.user',
            'pet.breed.species',
            'pet.size',
            'employee.user',
            'service',
        ]);

        if ($this->role === 'client') {
            $query->whereHas('pet.client', function ($q) {
                $q->where('id', $this->user->getClientId());
            });
        }

        return $query;
    }

    public function headings(): array
    {
        return [
            'ID',
            'Data do Agendamento',
            'Animal',
            'Raça',
            'Espécie',
            'Tamanho',
            'Tipo de Pêlo',
            'Cliente',
            'Empregado',
            'Serviço',
            'Preço Total',
            'Status',
        ];
    }

    public function map($appointment): array
    {
        return [
            $appointment->id,
            $appointment->appointment_date->format('d-m-Y H:i'),
            $appointment->pet->name ?? 'N/A',
            $appointment->pet->breed->name ?? 'N/A',
            $appointment->pet->breed->species->name ?? 'N/A',
            $appointment->pet->size->category ?? 'N/A',
            $appointment->pet->breed->fur_type ?? 'N/A',
            $appointment->pet->client->user->name ?? 'N/A',
            $appointment->employee->user->name ?? 'N/A',
            $appointment->service->name ?? 'N/A',
            number_format($appointment->total_price, 2, ',', '.') ?? 'N/A',
            $appointment->status ?? 'N/A',
        ];
    }
}
