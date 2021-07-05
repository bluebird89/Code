<?php


namespace Tests\demo;

use ArrayIterator;
use PHPUnit\Framework\TestCase;

class AssertionsTest extends TestCase
{
    public function testAssertionsMethodsWorksWithCorrectArguments()
    {
        $this->assertTrue(1 == 1);
        $this->assertTrue(true);
        $this->assertFalse(false);
        $this->assertFalse(0 == 1);

        $this->assertEquals('foo', 'foo');
        $this->assertEquals(1, "1");
        $this->assertNotEquals(1, 2);
        $this->assertSame(1, 1);
        $this->assertNotSame(1, "1");

        $this->assertContains('foo', ['foo', 'otherValue']);
        $this->assertContains('foo', new ArrayIterator(['foo', 'otherValue']));
        $this->assertNotContains('foo', ['otherValue']);
        $this->assertContainsOnly('string', ['foo', 'otherValue']);
        $this->assertArrayHasKey(0, ['foo']);
        $this->assertArrayHasKey('foo', ['foo' => 'bar', 'otherValue']);

        $this->assertStringStartsWith('He', 'Hello', "The string is not start with prefix");
    }
}
