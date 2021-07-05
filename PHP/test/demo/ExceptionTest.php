<?php

namespace Tests\demo;

use ArrayIterator;
use PHPUnit\Framework\Error;
use PHPUnit\Framework\InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class ExceptionTest extends TestCase
{
    public function testMethodRaiseExceptionAgain()
    {
        $this->expectException(InvalidArgumentException::class);
        $iterator = new ArrayIterator(42);
    }

    public function testException(): void
    {
        $this->expectException(InvalidArgumentException::class);
    }

//    public function testFailingInclude()
//    {
//        $this->expectException(Error::class);
//        include 'not_existing_file.php';
//    }
}
