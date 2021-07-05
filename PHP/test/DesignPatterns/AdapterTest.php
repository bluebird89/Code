<?php

namespace Tests\DesignPatterns;

use PHPUnit\Framework\TestCase;
use DesignPatterns\Structural\Adapter\EBookAdapter;
use DesignPatterns\Structural\Adapter\Kindle;
use DesignPatterns\Structural\Adapter\PaperBookInterface;
use DesignPatterns\Structural\Adapter\Book;

class AdapterTest extends TestCase
{
    /**
     * @return array
     */
    public function getBook()
    {
        return [
            [new Book()],
            // 我们在适配器中引入了电子书
            [new EBookAdapter(new Kindle())]
        ];
    }

    /**
     * 客户端只知道有纸质书，实际上第二本书是电子书，
     * 但是对客户来说代码一致，不需要做任何改动
     *
     * @param  PaperBookInterface  $book
     *
     * @dataProvider getBook
     */
    public function testIAmAnOldClient(PaperBookInterface $book)
    {
        $this->assertTrue(method_exists($book, 'open'));
        $this->assertTrue(method_exists($book, 'turnPage'));
    }
}
