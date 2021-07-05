<?php

namespace Tests\DesignPatterns;

use PHPUnit\Framework\TestCase;
use DesignPatterns\Behavioral\Iterator\Book;
use DesignPatterns\Behavioral\Iterator\BookList;
use DesignPatterns\Behavioral\Iterator\BookListIterator;
use DesignPatterns\Behavioral\Iterator\BookListReverseIterator;

class IteratorTest extends TestCase
{
    /**
     * @var BookList
     */
    protected $bookList;

    protected function setUp(): void
    {
        $this->bookList = new BookList();
        $this->bookList->addBook(new Book('Learning PHP Design Patterns', 'William Sanders'));
        $this->bookList->addBook(new Book('Professional Php Design Patterns', 'Aaron Saray'));
        $this->bookList->addBook(new Book('Clean Code', 'Robert C. Martin'));
    }

    public function expectedAuthors()
    {
        return array(
            array(
                array(
                    'Learning PHP Design Patterns by William Sanders',
                    'Professional Php Design Patterns by Aaron Saray',
                    'Clean Code by Robert C. Martin'
                )
            ),
        );
    }

    /**
     * @dataProvider expectedAuthors
     */
    public function testUseAIteratorAndValidateAuthors($expected)
    {
        $iterator = new BookListIterator($this->bookList);

        while ($iterator->valid()) {
            $expectedBook = array_shift($expected);
            $this->assertEquals($expectedBook, $iterator->current()->getAuthorAndTitle());
            $iterator->next();
        }
    }

    /**
     * @dataProvider expectedAuthors
     */
    public function testUseAReverseIteratorAndValidateAuthors($expected)
    {
        $iterator = new BookListReverseIterator($this->bookList);

        while ($iterator->valid()) {
            $expectedBook = array_pop($expected);
            $this->assertEquals($expectedBook, $iterator->current()->getAuthorAndTitle());
            $iterator->next();
        }
    }

    /**
     * Test BookList Remove
     */
    public function testBookRemove()
    {
        $this->bookList->removeBook($this->bookList->getBook(0));
        $this->assertEquals($this->bookList->count(), 2);
    }
}
