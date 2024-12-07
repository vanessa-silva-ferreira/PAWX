<?php

namespace App\Exports;

use App\Models\Pet;
//use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

//class PetsExport implements FromCollection
class PetsExport implements FromQuery, WithHeadings, ShouldAutoSize
{
    protected $user;
    protected $role;

    public function __construct($user, $role)
    {
        logger()->info('PetsExport initialized', ['user' => $user->id, 'role' => $role]);
        $this->user = $user;
        $this->role = $role;
    }

    public function query()
    {
        $query = Pet::with(['client.user', 'size', 'breed.species']);

        if ($this->role === 'client') {
            $query->where('client_id', $this->user->getClientId());
        }

        return $query;
    }

    public function headings(): array
    {
        return [
            'ID',
            'Client Name',
            'Size',
            'Breed',
            'Species',
            'Name',
            'Birthdate',
            'Gender',
            'Medical History',
            'Spay/Neuter Status',
            'Status',
            'Observations',
        ];
    }

    public function map($pet): array
    {
        return [
            $pet->id,
            $pet->client->user->name ?? 'N/A',
            $pet->size->category ?? 'N/A',
            $pet->breed->name ?? 'N/A',
            $pet->breed->species->name ?? 'N/A',
            $pet->name,
            $pet->birthdate ? $pet->birthdate->format('d-m-Y') : 'N/A',
            $pet->gender,
            $pet->medical_history ?? 'N/A',
            $pet->spay_neuter_status ? 'Esterilizado' : 'Não esterilizado',
            $pet->status === 'active' ? 'Ativo' : 'Inativo',
            $pet->obs ?? 'N/A',
        ];
    }
}
