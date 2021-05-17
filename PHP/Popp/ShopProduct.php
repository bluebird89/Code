<?php

namespace Popp;

class ShopProduct
{
    protected $price;
    private $title;
    private $producerMainName;
    private $producerFirstName;
    private $discount = 0;

    public function __construct($title, $firstName, $mainName, $price)
    {
        $this->title = $title;
        $this->producerFirstName = $firstName;
        $this->producerMainName = $mainName;
        $this->price = $price;
    }

    public function getProducerFirstName()
    {
        return $this->producerFirstName;
    }

    public function getProducerMainName()
    {
        return $this->producerMainName;
    }

    public function getDiscount()
    {
        return $this->discount;
    }

    public function setDiscount($num)
    {
        $this->discount = $num;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getPrice()
    {
        return ($this->price - $this->discount);
    }

    public function getProducer()
    {
        return "{$this->producerFirstName}"." {$this->producerMainName}";
    }

    public function getSummeryLine()
    {
        $base = "{$this->title} ( {$this->producerFirstName}, ";
        $base .= "{$this->producerMainName} )";
        return $base;
    }
}
