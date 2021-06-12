<?php

namespace Tests;

use oop\Trit\Satic\A;
use oop\Trit\Satic\B;

use oop\Trit\Satic\C;
use PHPUnit\Framework\TestCase;

class OopTest extends TestCase
{
    /*
     * 延迟绑定
     */
    public function testStatic()
    {
//      $this->assertEquals(B::class, B::test());
//      $this->assertEquals(B::class, B::who());
//      $this->assertEquals(B::class, (new  B())->getClassName());

        B::test();
        echo PHP_EOL;
        B::who();
        echo PHP_EOL;
        echo (new  B())->getClassName();
        echo PHP_EOL;
        echo C::foo();
    }
}
