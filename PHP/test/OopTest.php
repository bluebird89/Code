<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use syntax\oop\Satic\B;

class OopTest extends TestCase
{
    /**
     * @skip
     * @TODO:fix
     * 延迟绑定
     */
    public function testStatic()
    {
        $this->assertEquals(B::class, B::who());
        $this->assertEquals(B::class, B::who());
        $this->assertEquals(B::class, (new  B())->getClassName());

//        B::test();
//        echo PHP_EOL;
//        B::who();
//        echo PHP_EOL;
//        echo (new  B())->getClassName();
//        echo PHP_EOL;
//        echo C::foo();
    }
}
