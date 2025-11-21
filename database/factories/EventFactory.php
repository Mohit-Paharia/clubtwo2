<?php

namespace Database\Factories;

use App\Model\User;
use App\Model\Club;
use App\Model\Location;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->sentence(),
            'description' => fake()->paragraph(),
            'address' => fake()->address(),
            'club_id' => Club::factory(),
            'host_id' => User::factory(),
            'coordinator_id' => User::factory(),
            'location_id' => Location::factory(),
        ];
    }
}
