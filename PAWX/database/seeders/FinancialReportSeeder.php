<?php

namespace Database\Seeders;

use App\Models\Appointment;
use App\Models\FinancialReport;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FinancialReportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Appointment::all()->each(function ($appointment) {
            FinancialReport::factory()->create([
                'appointment_id' => $appointment->id,
            ]);
        });
    }
}
