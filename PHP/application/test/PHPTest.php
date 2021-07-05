<?php

use Application\services\UserService;
use PHPUnit\Framework\TestCase;

$autoload = dirname(__DIR__) . DIRECTORY_SEPARATOR . "../vendor/autoload.php";

if (file_exists($autoload)) {
    include_once $autoload;
}

class PHPTest extends TestCase
{
    public function testRun()
    {
        $tests = [
            '\stdClass',
        ];
        foreach ($tests as $test) {
            $this->assertEquals(
                true,
                class_exists($test),
                "$test class not found"
            );
        }
    }

    public function testMock()
    {
        $stub = $this->createMock(UserService::class);
        $stub->method('get')->willReturn(3);
        $this->assertEquals(3, $stub->get(1));
    }
}
