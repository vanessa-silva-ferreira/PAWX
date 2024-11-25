<?php

namespace Database\Factories;

use App\Enums\FurType;
use App\Models\Size;
use App\Models\Species;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Breed>
 */
class BreedFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'species_id'    => Species::factory(),
            'size_id'       => Size::factory(),
            'name'          => $this->faker->word,
            'fur_type'      => $this->faker->randomElement(FurType::cases())->value,
            'obs'           => $this->faker->sentence,
        ];
    }
}
