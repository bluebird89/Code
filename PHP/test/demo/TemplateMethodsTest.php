<?php

namespace Tests\demo;

use PHPUnit\Framework\TestCase;
use Throwable;

class TemplateMethodsTest extends TestCase
{
    public static function setUpBeforeClass(): void
    {
        fwrite(STDOUT, __METHOD__."\n");
    }

    public static function tearDownAfterClass(): void
    {
        fwrite(STDOUT, __METHOD__."\n");
    }

    public function testOne(): void
    {
        fwrite(STDOUT, __METHOD__."\n");
        $this->assertTrue(true);
    }

    public function testTwo(): void
    {
        fwrite(STDOUT, __METHOD__."\n");
        $this->assertTrue(true);
    }

    protected function setUp(): void
    {
        fwrite(STDOUT, __METHOD__."\n");
    }

    protected function assertPreConditions(): void
    {
        fwrite(STDOUT, __METHOD__."\n");
    }

    protected function assertpostConditions(): void
    {
        fwrite(STDOUT, __METHOD__."\n");
    }

    protected function tearDown(): void
    {
        fwrite(STDOUT, __METHOD__."\n");
    }

    protected function onNotSuccessfulTest(Throwable $e): void
    {
        fwrite(STDOUT, __METHOD__ . "\n");
        throw $e;
    }
}
