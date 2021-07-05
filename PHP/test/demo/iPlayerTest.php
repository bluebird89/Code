<?php

namespace Test\demo;

use PHPUnit\Framework\TestCase;
use syntax\phpunit\Card;
use syntax\phpunit\iPlayer;
use syntax\phpunit\CardCollection;

class iPlayerTest extends TestCase
{
    private $player;
    private $hand;

    public function setUp(): void
    {
        $this->hand = new CardCollection();
        $this->hand->addCard(new Card('A', 'Spades'));
        $this->player = $this->getMockForAbstractClass(
            iPlayer::class,
            array('John Smith', $this->hand)
        );
    }

    public function testRequestCardCallsChooseCardNumber()
    {
        $this->player->expects($this->once())
            ->method('chooseCardNumber')
            ->will($this->returnValue('A'));
        $this->assertEquals('A', $this->player->requestCard());
    }
}
