<?php


namespace syntax\phpunit;

class CliFormatter
{
    private function getCard(Card $card)
    {
        return $card->getNumber() . substr($card->getSuit(), 0, 1);
    }
}
