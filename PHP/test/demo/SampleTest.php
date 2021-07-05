<?php


namespace Tests\demo;

use PHPUnit\Framework\TestCase;

class SampleTest extends TestCase
{
    public function testSomething(): void
    {
        // 可选：如果愿意，在这里随便测试点什么。
        $this->assertTrue(true, 'This should already work.');

        // 在这里停止，并将此测试标记为未完成。
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }
}
