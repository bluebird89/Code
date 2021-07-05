<?php

namespace Tests\demo;

use Book;
use Mother;
use Newspaper;
use PHPUnit\Framework\TestCase;

class DITest extends TestCase
{
    /**
     * 控制反转
     * 依赖注入
     */
    public function testIOC()
    {
        $mother = new Mother();

        $this->assertEquals('很久很久以前有一个阿拉伯的故事……', $mother->narrate(new Book()));
        $this->assertEquals('林书豪17+9助尼克斯击败老鹰……', $mother->narrate(new Newspaper()));
    }
}
