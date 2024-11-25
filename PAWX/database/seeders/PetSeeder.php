<?php

namespace Database\Seeders;

use App\Models\Pet;
use App\Models\Breed;
use App\Models\Size;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use phpDocumentor\Reflection\DocBlock\Tags\Factory\Factory;

class PetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call(SpeciesSeeder::class);
        $this->call(SizeSeeder::class);

        Breed::factory(10)->create();

        Pet::factory(30)->create();

    }
}
