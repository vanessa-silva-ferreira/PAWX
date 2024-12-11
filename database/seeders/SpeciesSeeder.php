<?php

namespace Database\Seeders;

use App\Models\Species;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Enums\SpeciesType;

class SpeciesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Species::updateOrCreate(['name' => SpeciesType::GATO->value]);
        Species::updateOrCreate(['name' => SpeciesType::CAO->value]);
    }
}
