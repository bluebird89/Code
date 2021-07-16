<?php

namespace syntax\di;

require '../../vendor/autoload.php';

class Mother
{
    public function narrate(iReader $book)
    {
        return $book->getcontext();
    }
}

$mother = new Mother();
echo $mother->narrate(new Book()) . PHP_EOL;
echo $mother->narrate(new Newspaper()) . PHP_EOL;
