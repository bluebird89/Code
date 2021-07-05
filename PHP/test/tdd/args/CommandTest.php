<?php


namespace Tests\args;

use PHPUnit\Framework\TestCase;
use Tdd\Args\Commands;

class CommandTest extends TestCase
{
    public function testNormal()
    {
        $commands = new Commands('-l true -d /usr/bin/bash -p 80');

        self::assertEquals('true', $commands->getValue('l'));
        self::assertEquals('/usr/bin/bash', $commands->getValue('d'));
        self::assertEquals(80, $commands->getValue('p'));
    }
}
