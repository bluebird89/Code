<?php


namespace Tests\demo;

use PHPUnit\Framework\TestCase;
use ReflectionMethod;
use syntax\phpunit\Card;
use syntax\phpunit\CardCollection;
use syntax\phpunit\CliFormatter;
use syntax\phpunit\Player;

class CliFormatterTest extends TestCase
{
    private $formatter;

    public function setUp(): void
    {
        $this->formatter = new CliFormatter();
    }

    /**
     * @skip
     */
    public function testAnnouncePlayerHand()
    {
        $cards = new CardCollection();
        $cards->addCard(new Card('A', 'Spades'));
        $cards->addCard(new Card('2', 'Spades'));

        $player = $this->ateMock(Player::class);

        $player->expects($this->once())
            ->method('getHand')
            ->will($this->returnValue($cards));

        $this->expectOutputString("Current Hand: AS 2S \n\n");
        $this->formatter->announcePlayerHand($player);
    }

    /**
     * @skip
     */
    public function testAnnouncePlayerHandCallback()
    {
        $cards = new CardCollection();
        $cards->addCard(new Card('A', 'Spades'));
        $cards->addCard(new Card('2', 'Spades'));

        $player = $this->createMock(Player::class);
        $player->expects($this->once())
            ->method('getHand')
            ->will($this->returnValue($cards));
        $this->expectOutputString("Current Hand: AS 2S");
        $this->setOutputCallback(function ($output) {
            return trim($output);
        });
        $this->formatter->announcePlayerHand($player);
    }

    public function testGetCard()
    {
        $method = new ReflectionMethod('CliFormatter', 'getCard');
        $method->setAccessible(true);
        $card = new Card('A', 'Spades');
        $this->assertEquals('AS', $method->invoke(
            $this->formatter,
            $card
        ));
    }
}
