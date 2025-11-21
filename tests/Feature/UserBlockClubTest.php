<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use App\Models\Club;
use App\Models\Location;

class UserBlockClubTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_block_club()
    {
        $location = Location::factory()->create();
        $club = Club::factory(['location_id' => $location->id])->create();
        $user = User::factory(['location_id' => $location->id])->create();

        $user->blockedClubs()->attach($club->id);

        $this->assertTrue($user->blockedClubs->contains($club));
    }
}