<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Enums\SizeCategory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Size>
 */
class SizeFactory extends Factory
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
                SizeCategory::PORTE_GIGANTE->value,
                SizeCategory::PORTE_GRANDE->value,
                SizeCategory::PORTE_MEDIO->value,
                SizeCategory::PORTE_PEQUENO->value,
            ]),
        ];
    }
}
