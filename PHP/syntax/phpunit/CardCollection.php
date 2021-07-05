<?php


namespace syntax\phpunit;

class CardCollection
{

    private array $collections = [];

    public function addCard(Card $card)
    {
        $this->collections[] = $card;
    }

    public function count()
    {
        return count($this->collections);
    }

    public function getTopCard()
    {
        return array_pop($this->collections);
    }

    public function moveTopCardTo()
    {
    }
}
