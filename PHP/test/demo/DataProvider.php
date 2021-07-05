<?php

namespace Tests\demo;

use Helper\CsvFileIterator;
use PHPUnit\Framework\TestCase;

class DataProvider extends TestCase
{
    public function addtionOProvider()
    {
        return [
            [0, 1, 1],
            [1, 0, 1],
            [1, 0, 1],
            [1, 1, 2],
        ];
    }

    public function additionWithNegativeNumbersProvider(): array
    {
        return [
            [-1, 1, 0],
            [-1, -1, -2],
            [1, -1, 0]
        ];
    }

    public function addtionWithNameProvider()
    {
        return [
            'adding zeros' => [0, 0, 0],
            'zero plus one' => [0, 1, 1],
            'one plus zero' => [1, 0, 1],
            'one plus one' => [1, 1, 2]
        ];
    }

    public function addtionWithCsvProvider()
    {
        return new CsvFileIterator(__DIR__ . '/../../assets/files/data.csv');
    }

    /**
     * @dataProvider addtionOProvider
     * @dataProvider addtionWithNameProvider
     * @dataProvider addtionWithCsvProvider
     * @dataProvider additionWithNegativeNumbersProvider
     */
    public function testAdd($a, $b, $expected)
    {
        $this->assertEquals($expected, $a + $b);
    }

    public function trueValues()
    {
        return [
            [1],
            ['1'],
            ['on'],
            [true]
        ];
    }

    /**
     * @dataProvider trueValues
     */
    public function testBooleanEvaluation($value)
    {
        $actual = (bool)$value;
        $this->assertTrue($actual);
    }
}
