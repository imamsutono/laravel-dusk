<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Chrome;
use Tests\DuskTestCase;
use App\Models\User;

class LoginTest extends DuskTestCase
{
    use DatabaseMigrations;

    /** 
     * @test
     * @group login
     */
    public function user_can_login_and_redirect_to_dashboard()
    {
        $user = User::factory()->create([
            'email' => 'imam@pasuruan.dev',
        ]);
 
        $this->browse(function ($browser) use ($user) {
            $browser->visit('/login')
                    ->type('email', $user->email)
                    ->type('password', 'password')
                    ->press('LOG IN')
                    ->assertPathIs('/dashboard');

            $browser->logout();
        });
    }

    /** 
     * @test
     * @group login
     */
    public function user_cannot_login_with_invalid_credential()
    {
        $user = User::factory()->create([
            'email' => 'imamsutono@yseali.com'
        ]);

        $this->browse(function ($browser) use ($user) {
            $browser->visit('/login')
                    ->type('email', 'imam@pyf.or.id')
                    ->type('password', 'password')
                    ->press('LOG IN')
                    ->assertPathIs('/login')
                    ->assertSee('These credentials do not match our records.');
            
            $browser->logout();
        });
    }
}
