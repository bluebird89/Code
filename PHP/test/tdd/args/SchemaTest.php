<?php


namespace Tests\args;

use PHPUnit\Framework\TestCase;
use Tdd\Args\Schema;

class SchemaTest extends TestCase
{
    public function testBool()
    {
        $schema = new Schema('l:bool,p:int,d:string');

        self::assertEquals(true, $schema->getValue('l', true));
        self::assertEquals(false, $schema->getValue('l', false));
        self::assertEquals(false, $schema->getValue('l', null));
    }

    public function testInt()
    {
        $schema = new Schema('l:bool,p:int,d:string');
        self::assertEquals(1, $schema->getValue('p', 1));
    }

    public function testString()
    {
        $schema = new Schema('l:bool,d:string,p:int');
        self::assertEquals('/usr/bin/bash', $schema->getValue('d', '/usr/bin/bash'));
    }
}
