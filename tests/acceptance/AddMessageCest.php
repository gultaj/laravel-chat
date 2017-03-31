<?php


class AddMessageCest
{
    // tests
    public function createNewMessage(AcceptanceTester $I)
    {
        $user = factory(App\User::class)->create();
        $message = factory(App\Message::class)->make();

        $I->wantTo('see new message after creation');
        // $user = $I->have('App\User');
        $I->loginAs($user);
        $I->amOnPage('/home');
        $I->fillField('message', $message->title);
        $I->click('#send-message');
        $I->waitForText($message->title, 15);
        $I->seeInDatabase('messages', ['title' => $message->title]);
        $I->see($message->title);
    }

    public function seeLoadedMessages(AcceptanceTester $I)
    {
        $user1 = factory(App\User::class)->create();
        $user2 = factory(App\User::class)->create();
        $message1 = factory(App\Message::class)->make();
        $message2 = factory(App\Message::class)->make();
        $user1->messages()->create($message1->toArray());
        $user2->messages()->create($message2->toArray());

        $I->wantTo('see loaded messages');
        $I->loginAs($user1);
        $I->amOnPage('/home');
        $I->waitForText($message1->title, 10);
        $I->waitForText($message2->title, 10);
        $I->seeInDatabase('messages', ['title' => $message1->title]);
        $I->seeInDatabase('messages', ['title' => $message2->title]);
        $I->see($message1->title);
        $I->see($message2->title);
    }
}
