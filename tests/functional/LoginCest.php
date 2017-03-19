<?php


class LoginCest
{
    // tests
    public function tryToTest(FunctionalTester $I)
    {
        $user = factory(App\User::class)->create();

        $I->wantTo('login as a user');

        $I->amOnPage('/login');
        $I->fillField('email', $user->email);
        $I->fillField('password', 'secret');
        $I->click('button[type=submit]');

        $I->seeCurrentUrlEquals('/home');

    }
}
