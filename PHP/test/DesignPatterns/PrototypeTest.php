<?php

namespace Tests\DesignPatterns;

use DesignPatterns\Creational\Prototype\BarBookPrototype;
use DesignPatterns\Creational\Prototype\BookPrototype;
use DesignPatterns\Creational\Prototype\FooBookPrototype;
use PHPUnit\Framework\TestCase;

class PrototypeTest extends TestCase
{
    public function getPrototype()
    {
        return array(
            array(new FooBookPrototype()),
            array(new BarBookPrototype())
        );
    }

    /**
     * @dataProvider getPrototype
     *
     * @param  BookPrototype  $prototype
     */
    public function testCreation(BookPrototype $prototype)
    {
        $book = clone $prototype;
        $book->setTitle($book->getCategory().' Book');
        $this->assertInstanceOf('DesignPatterns\Creational\Prototype\BookPrototype', $book);
    }
}
