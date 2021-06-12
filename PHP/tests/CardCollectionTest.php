<?php

namespace Tests;

use oop\Card;
use oop\CardCollection;
use PHPUnit\Framework\TestCase;

class CardCollectionTest extends TestCase
{
    protected function setUp(): void
    {
        $this->cardCollection = new CardCollection();
    }

    /**
     * @var CardCollection
     */
    private CardCollection $cardCollection;

    public function testCountOnEmpty(): void
    {
        $this->assertEquals(0, $this->cardCollection->count());
    }

    /**
     * @return int
     * @depends  testCountOnEmpty
     */
    public function testAddCard()
    {
        $this->cardCollection->addCard(new Card('A', 'Spades'));
        $this->cardCollection->addCard(new Card('2', 'Spades'));

        return $this->cardCollection->count();
    }

    /**
     * @param  CardCollection  $cardCollection
     *
     * @depends testAddCard
     */
    public function testGetTopCard(CardCollection $cardCollection)
    {
        $card = $cardCollection->getTopCard();
        $this->assertEquals(new Card('2', 'Spades'), $card);
    }
}
