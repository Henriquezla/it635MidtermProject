USE Baseball;

DROP TABLE IF EXISTS players,pitching;
CREATE TABLE players (
    id INT UNSIGNED NOT NULL PRIMARY KEY,
    f_name VARCHAR(255) DEFAULT NULL,
	m_initial CHAR(1) DEFAULT NULL,
	l_name VARCHAR(255) DEFAULT NULL,
	dob DATE DEFAULT NULL,
	country VARCHAR(255) DEFAULT NULL,
	bats_throws VARCHAR(255) DEFAULT NULL
	
)Engine=InnoDB;


CREATE TABLE pitching (
    player_id INT UNSIGNED NOT NULL,
	games_pitched SMALLINT UNSIGNED DEFAULT NULL,
	games_won SMALLINT UNSIGNED DEFAULT NULL,
	games_lost SMALLINT UNSIGNED DEFAULT NULL,
	ERA FLOAT(3,3) DEFAULT NULL,
    PRIMARY KEY (player_id),
    FOREIGN KEY (player_id) REFERENCES players (id)
       ON DELETE CASCADE
       ON UPDATE CASCADE
)Engine=InnoDB;

