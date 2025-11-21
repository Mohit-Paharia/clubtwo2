<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use App\Models\Club;
use App\Models\Location;

class ClubMembershipTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_join_club()
    {
        $location = Location::factory()->create();
        $club = Club::factory(['location_id' => $location->id])->create();
        $user = User::factory(['location_id' => $location->id])->create();

        $club->members()->attach($user->id);

        $this->assertTrue($club->members->contains($user));
        $this->assertTrue($user->clubs->contains($club));
    }

    public function test_user_can_leave_club()
    {
        $location = Location::factory()->create();
        $club = Club::factory(['location_id' => $location->id])->create();
        $user = User::factory(['location_id' => $location->id])->create();

        $club->members()->attach($user->id);
        $club->members()->detach($user->id);

        $this->assertFalse($club->fresh()->members->contains($user));
    }
}

