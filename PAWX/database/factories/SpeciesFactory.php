<?php

namespace Database\Factories;

use App\Enums\SpeciesType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Species>
 */
class SpeciesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'  =>  $this->faker->randomElement([
                SpeciesType::GATO->value,
                SpeciesType::CAO->value,
            ]),
        ];
    }
}
