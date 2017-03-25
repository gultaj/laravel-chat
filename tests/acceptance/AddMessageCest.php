<?php


class AddMessageCest
{
    // tests
    public function createNewMessage(AcceptanceTester $I)
    {
        $user = factory(App\User::class)->create();
        $message = factory(App\Message::class)->make();

        $I->wantTo('see new message after creation');
        $I->loginAs($user);
        $I->amOnPage('/home');
        $I->fillField('message', $message->title);
        $I->click('#send-message');
        $I->waitForText($message->title, 5);
        $I->see($message->title);
    }
}
