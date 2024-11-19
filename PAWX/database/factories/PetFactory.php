<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pet>
 */
class PetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'client_id' => rand(1,20),
            'name' => $this->faker->name(),
            'birthdate' => $this->faker->date('Y-m-d'),
            'gender' => $this->faker->randomElement(['male', 'female']),
            'medical_history' => $this->faker->text(),
            'spay_neuter_status' => $this->faker->boolean(),
            'status' => $this->faker->randomElement(['active', 'inactive']),
            'obs' => $this->faker->text(),
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
