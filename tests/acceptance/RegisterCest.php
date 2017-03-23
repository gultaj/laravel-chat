<?php


class RegisterCest
{
    // tests
    public function tryToTest(AcceptanceTester $I)
    {
        $user = factory(App\User::class)->make();
        
        $I->wantTo('register new user');
        $I->amOnPage('/register');
        $I->fillField('name', $user->name);
        $I->fillField('email', $user->email);
        $I->fillField('password', 'secret');
        $I->fillField('password_confirmation', 'secret');
        
        // $I->makeScreenshot('register_page');
        $I->click('button[type=submit]');

        $I->seeCurrentUrlEquals('/home');
    }
}
