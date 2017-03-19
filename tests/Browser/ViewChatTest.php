<?php

namespace Tests\Browser;

use App\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ViewChatTest extends DuskTestCase
{
    use DatabaseMigrations;
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testViewNewMessage()
    {
        $user = factory(User::class)->create();

        $this->browse(function ($browser) use ($user) {
            $browser->loginAs($user)
                ->visit('/home')
                ->assertSee('New message');
        });
    }

    public function testAddMessage()
    {
        $this->browse(function (Browser $browser) {
            $user = factory(User::class)->create();
            $browser->loginAs($user)
                ->visit('/home')
                ->type('message', 'Another message')
                ->press('Send')
                ->pause(1000);

            $browser->assertSee('Another message');
        });
    }
}
