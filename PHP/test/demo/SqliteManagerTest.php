<?php

namespace Tests\demo;

use syntax\phpunit\SqliteManager;

class SqliteManagerTest extends BaseDatabaseTest
{
    private $sqliteManager;

    public function setUp(): void
    {
        parent::setUp();
        $this->sqliteManager = new SqliteManager(self::$systemPdo);
    }

    /**
     * @group db
     */
    public function testUpdateGame()
    {
        $this->sqliteManager->updateGame(1, 'Player2');
        $expectedDataSet = $this->createXMLDataSet(__DIR__ . '/expected/SqliteManagerTestUpdateGame.xml');
        $this->assertDataSetsEqual($expectedDataSet, $this->getConnection()->createDataSet(array('game')));
    }

    protected function getDataSet()
    {
        return $this->createXMLDataSet(__DIR__ . '/fixtures/SqliteManagerTest.xml');
    }
}
