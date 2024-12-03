<?php

namespace Database\Seeders;

use App\Enums\SizeCategory;
use App\Models\Size;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Size::updateOrCreate(['category' => SizeCategory::PORTE_GIGANTE->value]);
        Size::updateOrCreate(['category' => SizeCategory::PORTE_GRANDE->value]);
        Size::updateOrCreate(['category' => SizeCategory::PORTE_MEDIO->value]);
        Size::updateOrCreate(['category' => SizeCategory::PORTE_PEQUENO->value]);
    }
}
