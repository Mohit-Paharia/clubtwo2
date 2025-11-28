<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Http;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Admin;
use App\Models\Club;
use App\Models\Event;
use App\Models\Location;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $admin = User::factory()->create([
            'first_name' => 'Mohit',
            'last_name'  => 'Paharia',
            'email'      => 'test@example.com',
            'password'   => bcrypt('password'),
        ]);

        $user = User::factory()->create([
            'first_name' => 'Rahul',
            'last_name'  => 'Jain',
            'email'      => 'test2@example.com',
            'password'   => bcrypt('password'),
        ]);

        $club = Club::factory()->create([
            'owner_id' => $admin->id,
        ]);

        $response = Http::get("http://ipinfo.io/106.76.94.122/json")->json(); 
        $location = Location::firstOrCreate([
            'city' => $response['city'],
            'state' => $response['region'],
            'country' => $response['country'],
        ]);

        Event::factory()
            ->count(10)
            ->create([
                'club_id' => $club->id,
                'location_id' => $location->id
            ]);

        Club::factory()
            ->count(5)
            ->create([
                'owner_id' => $admin->id,
            ]);
        
        Club::factory()
            ->count(5)
            ->create([
                'owner_id'=> $user->id
            ]);

        Admin::create([
            'user_id' => $admin->id
        ]);
    }
}
