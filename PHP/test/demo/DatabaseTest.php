<?php

namespace Tests\demo;

use PDO;
use PHPUnit\Framework\TestCase;

//在同一个测试套件内的不同测试之间共享基境
class DatabaseTest extends TestCase
{
//    protected static $dbh;
//
//    public static function setUpBeforeClass(): void
//    {
//        self::$dbh = new PDO('sqlite::memory:');
//    }
//
//    public static function tearDownAfterClass(): void
//    {
//        self::$dbh = null;
//    }

    protected function setUp(): void
    {
        if (!extension_loaded('mysqli')) {
            $this->markTestSkipped(
                'The MySQLi extension is not available.'
            );
        }
    }

    public function testtSomthing(): void
    {
        $this->markTestIncomplete('something new');
    }

    /**
     * @requires PHP > 7.4
     */
    public function testConnection(): void
    {
        // 测试需要 mysqli 扩展，并且要求 PHP >= 5.3
    }
}
