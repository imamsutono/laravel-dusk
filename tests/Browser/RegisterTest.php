<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class RegisterTest extends DuskTestCase
{
    use DatabaseMigrations;

    /** 
     * @test
     * @group register
     */
    public function user_can_register_with_valid_data()
    {
        $this->browse(function ($browser) {
            $browser->visit('/register')
                    ->type('name', 'Imam Sutono')
                    ->type('email', 'imamsutono@yseali.com')
                    ->type('password', 'password')
                    ->type('password_confirmation', 'password')
                    ->press('REGISTER')
                    ->assertPathIs('/dashboard');
        });
    }
}
