<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User;

class LoginTest extends DuskTestCase
{
    /**
     * Login Process Test
     */
    public function testLogin(): void
    {
        $user = User::factory()->create([
            'password' => bcrypt('password'),
        ]);
        
        $this->browse(function (Browser $browser) use ($user) {
            $browser->visit('/auth/login')->screenshot('login-page');

            $browser->type('email', $user->email)
                    ->type('#password', 'password')
                    ->press('Login')
                    ->assertPathIs('/');

            $browser->pause(2000);
            $browser->screenshot('login-success');
        });
    }
}
