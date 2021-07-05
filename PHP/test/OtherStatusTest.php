<?php

namespace Tests;

use PHPUnit\Framework\TestCase;

class OtherStatusTest extends TestCase
{


    public function testSomething()
    {
        // 可选：如果愿意，在这里随便测试点什么。
        $this->assertTrue(true, '这应该已经是能正常工作的。');

        // 在这里停止，并将此测试标记为未完成。
        $this->markTestIncomplete(
            '此测试目前尚未实现。'
        );
    }

    /**
     * @requires PHP 5.3
     */
    public function testConnection()
    {
        // 测试要求有 mysqli 扩展，并且 PHP >= 5.3
    }

    protected function setDown(): void
    {
        if (!extension_loaded('mysqli')) {
            $this->markTestSkipped(
                'MySQLi 扩展不可用。'
            );
        }
    }
}
