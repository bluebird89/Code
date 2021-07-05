<?php


namespace syntax\phpunit;

abstract class iPlayer
{
    public function requestCard()
    {
        $cardNumber = $this->chooseCardNumber();
        if (!$this->hasCard($cardNumber)) {
            throw new RuntimeException('Invalid card chosen by player');
        }

        return $cardNumber;
    }

    abstract protected function chooseCardNumber();
}
