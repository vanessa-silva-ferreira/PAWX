<?php

namespace App\Exports;

use App\Models\Client;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
class ClientsExport implements FromQuery, WithMapping, WithHeadings, ShouldAutoSize
{
    public function query()
    {
        return Client::with(['user']);
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nome',
            'Email',
            'Contacto',
            'NIF',
            'Morada',
        ];
    }

    public function map($client): array
    {
        return [
            $client->id,
            $client->user->name ?? 'N/A',
            $client->user->email ?? 'N/A',
            $client->user->phone_number ?? 'N/A',
            $client->user->nif ?? 'N/A',
            $client->user->address ?? 'N/A',
        ];
    }
}
