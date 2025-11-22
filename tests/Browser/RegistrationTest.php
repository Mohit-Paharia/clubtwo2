<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class RegistrationTest extends DuskTestCase
{
    /**
     * Registration Process Test
     */
    public function testRegistration(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/auth/register')
                    ->screenshot('Registration Page');

            $browser->type('email', fake()->email)
                    ->type('password', 'password')
                    ->type('first_name', fake()->firstName)
                    ->type('last_name', fake()->lastName)
                    ->type('phone_number', fake()->phoneNumber)
                    ->type('address', fake()->address)      
                    ->type('city', fake()->city)
                    ->type('state', fake()->state)
                    ->type('country', fake()->country)
                    ->screenshot('Registration Filled')
                    ->press('Register');


            $browser->pause(2000);        
                $browser->screenshot('Registration Submit');

        });
    }
}
