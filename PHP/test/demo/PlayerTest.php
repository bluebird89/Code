<?php

namespace T\demo;

use PHPUnit\Framework\TestCase;
use RuntimeException;
use syntax\phpunit\Card;
use syntax\phpunit\CardCollection;
use syntax\phpunit\Player;

/**
 * @method setExpectedException(string $string, string $string1)
 */
class PlayerTest extends TestCase
{
    private $player;
    private $hand;

    public function setUp(): void
    {
        $this->hand = $this->createMock(CardCollection::class);
        $this->player = new Player('John Smith', $this->hand);
    }

    public function testDrawCard()
    {
        $deck = $this->getMockClass('CardCoolection');
        $deck->expects($this->once())->method('moveTopCardTo')->with($this->identicalTo($this->hand));
        $this->player->drawCard($deck);
    }

    public function testTakeCardFromPlayer()
    {
        $otherHand = $this->createMock(CardCollection::class);
        $otherPlayer = $this->getMockClass(Player::class, [], ['Jane Smith', $otherHand]);
        $card = $this->getMockClass(Card::class, [], ['A', 'Spades']);

        $otherPlayer->expects($this->once())
            ->method('getCard')
            ->with($this->equalTo(4))
            ->will($this->returnValue($card));

        $otherPlayer->expects($this->once())
            ->method('getHand')
            ->will($this->returnValue($otherHand));

        $this->hand->expects($this->once())
            ->method('addCard')
            ->with($this->identicalTo($card));

        $otherHand->expects($this->once())
            ->method('removeCard')
            ->with($this->identicalTo($card));

        $this->assertTrue($this->player->takeCards($otherPlayer, 4));
    }

    public function testRequestCardThrowsOnInvalidCard()
    {
        $this->player->expects($this->once())
            ->method('chooseCardNumber')
            ->will($this->returnValue('2'));
        $this->setExpectedException('RuntimeException', 'Invalid card chosen by player');
        $this->player->requestCard();
    }

    public function testRequestCardThrowsOnInvalidCardUsingAnnotation()
    {
        $this->expectExceptionMessage("Invalid card chosen by player");
        $this->expectException(RuntimeException::class);
        $this->player->expects($this->once())
            ->method('chooseCardNumber')
            ->will($this->returnValue('2'));
        $this->player->requestCard();
    }
}
