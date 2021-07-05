<?php


namespace syntax\phpunit;

class Player
{
    private $name;
    private CardCollection $hand;

    public function __construct($name, $hand)
    {
        $this->name = $name;
        $this->hand = $hand;
    }

    public function drawCard()
    {
    }

    public function takeCardFromPlayer()
    {
    }

    public function moveTopCardTo()
    {
    }

    public function takeCards()
    {
    }

    public function requestCard()
    {
        $cardNumber = $this->chooseCardNumber();
        if (!$this->hasCard($cardNumber)) {
            throw new RuntimeException('Invalid card chosen by player');
        }
        return $cardNumber;
    }
}
