<?php


namespace Tests\demo;

use ArrayIterator;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class AnnotationsTest extends TestCase
{
    public function testMethodRaiseException()
    {
        try {
            $iterator = new ArrayIterator(42);
            $this->fail();
        } catch (InvalidArgumentException $e) {
        }
    }

    public function testMethodRaiseExceptionAgain()
    {
        $this->expectException(InvalidArgumentException::class);
        $iterator = new ArrayIterator(42);
    }

    public function testBooleanEvaluationInALoop()
    {
        $values = array(1, '1', 'on', true);
        foreach ($values as $value) {
            $actual = (bool)$value;
            $this->assertTrue($actual);
        }
    }

    public static function trueValues()
    {
        return array(
            array(1),
            array('1'),
            array('on'),
            array(true)
        );
    }

    /**
     * @dataProvider trueValues
     */
    public function testBooleanEvaluation($value)
    {
        $actual = (bool)$value;
        $this->assertTrue($actual);
    }

    public function testArrayAdditionWorks()
    {
        $array = array();
        $array[0] = 'foo';
        $this->assertTrue(isset($array[0]));
        return $array;
    }

    /**
     * @depends testArrayAdditionWorks
     */
    public function testArrayRemovalWorks($fixture)
    {
        unset($fixture[0]);
        $this->assertFalse(isset($fixture[0]));
    }
}
