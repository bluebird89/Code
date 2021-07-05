<?php


namespace syntax\phpunit;

class SqliteManager
{
    private $sqliteConnection;

    public function __construct(PDO $sqliteConnection)
    {
        $this->sqliteConnection = $sqliteConnection;
    }

    public function updateGame($gameId, $currentPlayerName)
    {
        $gameUpdateQuery = "
UPDATE game
SET current_player_id = (
SELECT id
FROM player
WHERE
game_id = ?
AND name = ?
)
WHERE id = ?
}";
        $stm = $this->sqliteConnection->prepare($gameUpdateQuery);
        $stm->execute(array($gameId, $currentPlayerName, $gameId));
    }
}
