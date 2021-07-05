<?php


namespace Tests\demo;

use PDO;
use PHPUnit\Framework\TestCase;

class BaseDatabaseTest extends TestCase
{
    protected static $testPdo;
    protected static $systemPdo;

    public static function setUpBeforeClass(): void
    {
        self::$testPdo = new PDO(DB_DSN);
        self::$testPdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        self::$systemPdo = new PDO(DB_DSN);
        self::$systemPdo->setAttribute(
            PDO::ATTR_ERRMODE,
            PDO::ERRMODE_EXCEPTION
        );
    }

    public static function tearDownAfterClass(): void
    {
        self::$testPdo = null;
        self::$systemPdo = null;
    }

    protected function getConnection()
    {
        return $this->createDefaultDBConnection(self::$testPdo);
    }
}
