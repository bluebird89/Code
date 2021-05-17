<?php

namespace Popp;

class CdProduct extends ShopProduct
{
    private int $playLength = 0;

    public function __construct($title, $firstName, $mainName, $price, $playLength)
    {
        parent::__construct($title, $firstName, $mainName, $price);
        $this->playLength = $playLength;
    }

    public function getSummeryLine()
    {
        $base = parent::getSummeryLine();
        return $base.": playing time - {$this->getPlayLength()}";
    }

    public function getPlayLength()
    {
        return $this->playLength;
    }
}
