<?php

namespace syntax\closure;

class Cart
{
    const PRICE_BUTTER = 1.00;
    const PRICE_MILK = 3.00;
    const PRICE_EGGS = 6.95;

    protected $products = [];

    public function add($product, $quantity): void
    {
        $this->products[$product] = $quantity;
    }

    public function getQuantity($product)
    {
        return isset($this->products[$product]) ? $this->products[$product] : false;
    }

    public function getTotal($tax)
    {
        $total = 0.00;

        $callback = function ($quantity, $product) use ($tax, &$total) {
            $priceItem = constant(__CLASS__ . "::PRICE_" . strtoupper($product));
            $total += ($priceItem * $quantity) * ($tax + 1.0);
        };

        array_walk($this->products, $callback);
        return round($total, 2);
    }
}

$my_cart = new Cart();
$my_cart->add('butter', 1);
$my_cart->add('milk', 3);
$my_cart->add('eggs', 6);

print "Total Charge:$" . $my_cart->getTotal(0.05) . PHP_EOL;

function html($code, $id = "", $class = "")
{
    if ($id !== "") {
        $id = " id = \"$id\"";
    }

    $class = ($class !== "") ? " class =\"$class\"" : ">";

    $open = "<$code$id$class";

    $close = "</$code>";

    return function ($inner = "") use ($open, $close) {
        return "$open$inner$close";
    };
}

$fib = function ($n) use (&$fib) {
    if ($n == 0 || $n == 1) {
        return 1;
    }

    return $fib($n - 1) + $fib($n - 2);
};
echo $fib(2) . PHP_EOL;
