<?php

namespace App\Exports;

use App\Models\Pet;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;


class PetsExport implements FromQuery, WithMapping, WithHeadings, ShouldAutoSize
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
            'Nome',
            'Cliente',
            'Tamanho',
            'Raça',
            'Espécie',
            'Data de Nascimento',
            'Sexo',
            'Historial Médico',
            'Esterilização',
            'Estado',
            'Observações',
        ];
    }

    public function map($pet): array
    {
        return [
            $pet->id,
            $pet->name,
            $pet->client->user->name ?? 'N/A',
            $pet->size->category ?? 'N/A',
            $pet->breed->name ?? 'N/A',
            $pet->breed->species->name ?? 'N/A',
            $pet->birthdate ? $pet->birthdate->format('d-m-Y') : 'N/A',
            $pet->gender ? \App\Enums\PetSex::from($pet->gender)->label() : 'N/A',
            $pet->medical_history ?? 'N/A',
            $pet->spay_neuter_status ? 'Esterilizado' : 'Não esterilizado',
            $pet->status === 'active' ? 'Ativo' : 'Inativo',
            $pet->obs ?? 'N/A',
        ];
    }
}
