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
        $I->waitForText($message->title, 15);
        $I->seeInDatabase('messages', ['title' => $message->title]);
        $I->see($message->title);
    }
}
