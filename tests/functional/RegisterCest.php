<?php


class RegisterCest
{
    // tests
    public function registerNewUserAndRedirectToHome(AcceptanceTester $I)
    {
        $user = factory(App\User::class)->make();
        
        $I->wantTo('register new user');
        $I->amOnPage('/register');
        $I->fillField('name', $user->name);
        $I->fillField('email', $user->email);
        $I->fillField('password', 'secret');
        $I->fillField('password_confirmation', 'secret');
        $I->click('button[type=submit]');
        $I->seeCurrentUrlEquals('/home');
    }

    public function failedRegisterIfUserExists(AcceptanceTester $I)
    {
        $user = factory(App\User::class)->create();

        $I->wantTo('see error mesage if user exists');
        $I->amOnPage('/register');
        $I->fillField('name', $user->name);
        $I->fillField('email', $user->email);
        $I->fillField('password', 'secret');
        $I->fillField('password_confirmation', 'secret');
        $I->click('button[type=submit]');

        $I->dontSeeCurrentUrlEquals('/home');
        $I->see('The email has already been taken.');
        $I->seeElement('div.form-group.has-error');
    }
}
