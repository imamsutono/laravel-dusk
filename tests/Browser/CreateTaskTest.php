<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CreateTaskTest extends DuskTestCase
{
    /**
     * @test
     * @group task
     */
    public function user_can_create_task_and_redirect_to_task_list()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tasks/create')
                    ->type('title', 'learn laravel dusk')
                    ->press('ADD TASK')
                    ->waitUntilMissing('.btn-add')
                    ->assertPathIs('/tasks')
                    ->assertSee('learn laravel dusk');
        });
    }
}
