USE Baseball;

DROP TABLE IF EXISTS
	game_results,
	team_roster_per_season,
	batting,
	pitching,
	game_schedule,
	seasons,
	players,
	teams;

CREATE TABLE players (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    f_name VARCHAR(255) NOT NULL,
	m_initial CHAR(1) DEFAULT NULL,
	l_name VARCHAR(255) NOT NULL,
	dob DATE NOT NULL,
	country VARCHAR(255) NOT NULL,
	bats_throws VARCHAR(255) NOT NULL,
	PRIMARY KEY(id)
	
)Engine=InnoDB;
ALTER TABLE players AUTO_INCREMENT=100000;

CREATE TABLE pitching (
    player_id INT UNSIGNED NOT NULL,
	games_pitched SMALLINT UNSIGNED NOT NULL,
	games_won SMALLINT UNSIGNED NOT NULL,
	games_lost SMALLINT UNSIGNED NOT NULL,
	ERA FLOAT(5,3) NOT NULL,
	K SMALLINT UNSIGNED NOT NULL,
	BB SMALLINT UNSIGNED NOT NULL,
    PRIMARY KEY (player_id),
    FOREIGN KEY (player_id) REFERENCES players (id)
       ON DELETE CASCADE
       ON UPDATE CASCADE
)Engine=InnoDB;

CREATE TABLE batting (
    player_id INT UNSIGNED NOT NULL,
	games_played SMALLINT UNSIGNED NOT NULL,
	AB SMALLINT UNSIGNED NOT NULL,
	H SMALLINT UNSIGNED NOT NULL,
	bat_AVG FLOAT(3,3) NOT NULL,
	BB SMALLINT UNSIGNED NOT NULL,
	K SMALLINT UNSIGNED NOT NULL,
    PRIMARY KEY (player_id),
    FOREIGN KEY (player_id) REFERENCES players (id)
       ON DELETE CASCADE
       ON UPDATE CASCADE
)Engine=InnoDB;

CREATE TABLE teams (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
	abbreviation VARCHAR(255) NOT NULL,
	games_played SMALLINT UNSIGNED NOT NULL,
	games_won SMALLINT UNSIGNED NOT NULL,
	games_lost SMALLINT UNSIGNED NOT NULL,
	PRIMARY KEY(id)
	
)Engine=InnoDB;
ALTER TABLE teams AUTO_INCREMENT=10000;

CREATE TABLE seasons (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    season_year SMALLINT UNSIGNED NOT NULL,
	PRIMARY KEY(id)
	
)Engine=InnoDB;
ALTER TABLE seasons AUTO_INCREMENT=10;

CREATE TABLE team_roster_per_season (
    player_id INT UNSIGNED NOT NULL,
	team_id INT UNSIGNED NOT NULL,
	season_id INT UNSIGNED NOT NULL,
    PRIMARY KEY (player_id,team_id,season_id),
    FOREIGN KEY (player_id) REFERENCES players (id)
       ON DELETE CASCADE
       ON UPDATE CASCADE,
	FOREIGN KEY (team_id) REFERENCES teams (id)
       ON DELETE CASCADE
       ON UPDATE CASCADE,
	FOREIGN KEY (season_id) REFERENCES seasons (id)
       ON DELETE CASCADE
       ON UPDATE CASCADE
)Engine=InnoDB;

CREATE TABLE game_schedule (
    id VARCHAR(255) GENERATED ALWAYS AS(CONCAT('TA',team_A_id,'TB',team_B_id,'DT',schd_date)),
    team_A_id INT UNSIGNED NOT NULL,
	team_B_id INT UNSIGNED NOT NULL,
	schd_date DATE NOT NULL,
	schd_time TIME NOT NULL,
	town VARCHAR(255) NOT NULL,
	PRIMARY KEY(team_A_id,team_B_id,schd_date),
	FOREIGN KEY (team_A_id) REFERENCES teams (id)
       ON DELETE CASCADE
       ON UPDATE CASCADE,
	FOREIGN KEY (team_B_id) REFERENCES teams (id)
       ON DELETE CASCADE
       ON UPDATE CASCADE
	
)Engine=InnoDB;


CREATE TABLE game_results (
	schd_id VARCHAR(255) NOT NULL,
    team_w INT UNSIGNED NOT NULL,
	team_w_score TINYINT UNSIGNED NOT NULL,
	team_l INT UNSIGNED NOT NULL,
	team_l_score TINYINT UNSIGNED NOT NULL,
	total_innings TINYINT UNSIGNED NOT NULL,
	PRIMARY KEY(schd_id,team_w,team_l),
	FOREIGN KEY (team_w) REFERENCES teams (id)
       ON DELETE CASCADE
       ON UPDATE CASCADE,
	FOREIGN KEY (team_l) REFERENCES teams (id)
       ON DELETE CASCADE
       ON UPDATE CASCADE
	
)Engine=InnoDB;


CREATE TABLE IF NOT EXISTS users (
	email_hash VARCHAR(255) NOT NULL,
    f_name VARCHAR(255) NOT NULL,
	l_name VARCHAR(255) NOT NULL,
	pw_hash VARCHAR(255) NOT NULL,
	admin_rights CHAR(1) DEFAULT NULL,
	PRIMARY KEY(email_hash)
	
)Engine=InnoDB;
