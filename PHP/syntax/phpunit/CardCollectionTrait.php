<?php


namespace syntax\phpunit;

trait CardCollectionTrait
{
    public function count()
    {
        return count($this->cards);
    }
}
