<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use App\Models\Club;
use App\Models\Location;

class ClubBlockUserTest extends TestCase
{
    use RefreshDatabase;

    public function test_club_can_block_user()
    {
        $location = Location::factory()->create();
        $club = Club::factory(['location_id' => $location->id])->create();
        $user = User::factory(['location_id' => $location->id])->create();

        $club->blockedUsers()->attach($user->id);

        $this->assertTrue($club->blockedUsers->contains($user));
        $this->assertTrue($user->blockedByClubs->contains($club));
    }
}