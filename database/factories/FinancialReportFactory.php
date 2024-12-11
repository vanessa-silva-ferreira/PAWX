<?php

namespace Database\Factories;

use App\Models\Appointment;
use App\Models\FinancialReport;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FinancialReport>
 */
class FinancialReportFactory extends Factory
{
    protected $model = FinancialReport::class;

    public function definition(): array
    {
        $appointment = Appointment::inRandomOrder()->first();

        return [
            'appointment_id' => $appointment->id,
        ];
    }
}
