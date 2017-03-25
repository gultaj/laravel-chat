<?php


class LoginCest
{
    // tests
    public function viewHomePageAfterLogin(AcceptanceTester $I)
    {
        $user = factory(App\User::class)->create();
        
        $I->wantTo('see message on the page');
        $I->amOnPage('/login');
        $I->fillField('email', $user->email);
        $I->fillField('password', 'secret');
        $I->click('button[type=submit]');
        $I->seeCurrentUrlEquals('/home');
    }

    public function redirectToHomeIfLoggedUser(AcceptanceTester $I)
    {
        $user = factory(App\User::class)->create();

        $I->wantTo('view /home after visit /login');
        $I->amOnPage('/login');
        $I->fillField('email', $user->email);
        $I->fillField('password', 'secret');
        $I->click('button[type=submit]');
        $I->seeCurrentUrlEquals('/home');

        $I->amOnPage('/login');
        $I->seeCurrentUrlEquals('/home');
    }

    public function failedLoginIfUserNotExists(AcceptanceTester $I)
    {
        $user = factory(App\User::class)->make();

        $I->wantTo('see error after login if user not exists');
        $I->amOnPage('/login');
        $I->fillField('email', $user->email);
        $I->fillField('password', 'secret');
        $I->click('button[type=submit]');
        
        $I->dontSeeCurrentUrlEquals('/home');
        $I->see('These credentials do not match our records.');
        $I->seeElement('div.form-group.has-error');
    }
}
