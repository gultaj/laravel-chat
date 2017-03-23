<?php


class ChatPageCest
{
    // tests
    public function viewMessageOnPage(AcceptanceTester $I)
    {
        $user = factory(App\User::class)->make();
        
        $I->wantTo('see message on the page');
        $I->amOnPage('/login');
        $I->haveInDatabase('users', ['name' => $user->name, 'email' => $user->email, 'password' => bcrypt('secret')]);
        $I->fillField('email', $user->email);
        $I->fillField('password', 'secret');
        $I->click('button[type=submit]');

        $I->seeCurrentUrlEquals('/home');
        $I->see('New message');
    }
}
