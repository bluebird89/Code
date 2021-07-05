<?php

namespace Tests\tdd;

use FizzBuzz;
use PHPUnit\Framework\TestCase;

class FizzBuzzTest extends TestCase
{

    public function testPrintByDigitShouldReturnFizzWhenDividedBy3(): void
    {
        $this->assertEquals('Fizz', FizzBuzz::printByDigit(18));
    }

    public function testShouldReturnBuzzWhenDiviedBy5()
    {
        $this->assertEquals('Buzz', FizzBuzz::printByDigit(25));
    }

    public function testShouldReturnFizzBuzzWhenDiviedBy3and5()
    {
        $this->assertEquals('FizzBuzz', FizzBuzz::printByDigit(15));
    }
}
