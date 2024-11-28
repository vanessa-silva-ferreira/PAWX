<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('services')->insert([
            [
                'name' => 'Banho',
                'obs' => 'Banho completo com produtos especializados.',
                'price' => 10.00,
                'cost' => 3.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Tosquia',
                'obs' => 'Corte e modelagem de pelos.',
                'price' => 7.00,
                'cost' => 1.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Banho e Tosquia',
                'obs' => 'Banho completo com produtos especializados e corte e modelagem de pelos.',
                'price' => 20.00,
                'cost' => 4.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
