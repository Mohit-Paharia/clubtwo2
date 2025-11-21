<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use App\Models\Club;
use App\Models\Location;

class ClubJoinRequestTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_request_to_join_a_club()
    {
        $location = Location::factory()->create();
        $club = Club::factory(['location_id' => $location->id])->create();
        $user = User::factory(['location_id' => $location->id])->create();

        $club->joinRequests()->attach($user->id);

        $this->assertTrue($club->joinRequests->contains($user));
        $this->assertTrue($user->joinRequestedClubs->contains($club));
    }
}
