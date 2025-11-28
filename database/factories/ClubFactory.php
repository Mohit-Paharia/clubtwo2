<?php

namespace Database\Factories;

use App\Models\Location;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Club>
 */
class ClubFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user = UserFactory::new()->create();

        return [
            'name' => fake()->word(),
            'description' => fake()->paragraph(),
            'owner_id' => $user->id,
            'location_id' => Location::factory(),
        ];
    }
}
