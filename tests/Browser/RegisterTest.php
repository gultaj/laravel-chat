<?php

namespace Tests\Browser;

use App\User;
use Tests\DuskTestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class RegisterTest extends DuskTestCase
{
    use DatabaseMigrations;
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->browse(function ($browser) {
            $user = factory(User::class)->make();
            $browser->visit('/register')
                ->type('name', $user->name)
                ->type('email', $user->email)
                ->type('password', 'secret')
                ->type('password_confirmation', 'secret')
                ->press('Register');

            $browser->pause(1000)->assertPathIs('/home');
            $browser->assertSee('Laravel');
        });
    }
}
