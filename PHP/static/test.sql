CREATE TABLE game
(
    id                INTEGER PRIMARY KEY AUTOINCREMENT,
    date_created      DATETIME,
    current_player_id INTEGER
);

CREATE TABLE player
(
    id      INTEGER PRIMARY KEY AUTOINCREMENT,
    game_id INTEGER,
    name    VARCHAR,
    hand    VARCHAR
);
