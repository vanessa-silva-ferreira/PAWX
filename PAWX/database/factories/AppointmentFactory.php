<?php

namespace Database\Factories;

use App\Enums\AppointmentStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Appointment>
 */
class AppointmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'pet_id' => $this->faker->numberBetween(1, 2),
            'employee_id' => $this->faker->numberBetween(1, 2),
            'appointment_date' => $this->faker->date(),
            'service_id' => $this->faker->numberBetween(1, 3),
            'status'  =>  $this->faker->randomElement([
                AppointmentStatus::PENDING->value,
                AppointmentStatus::CONFIRMED->value,
                AppointmentStatus::COMPLETED->value,
                AppointmentStatus::CANCELLED->value,
                AppointmentStatus::NO_SHOW->value,
            ]),
            'total_price' => $this->faker->randomFloat(2, 10, 100),
            'created_at' => $this->faker->dateTimeBetween('-90 days', 'now'),
            'updated_at' => now(),
        ];
    }
}
