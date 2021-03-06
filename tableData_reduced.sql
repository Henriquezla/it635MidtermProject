INSERT INTO players (f_name, m_initial, l_name, dob, country, bats_throws) VALUES
('Isobel', 'L', 'Hugli', '2002-09-07', 'MU', 'R'),
('Nanice', 'J', 'Stickles', '2001-05-06', 'UA', 'L'),
('Rosemary', 'O', 'Hebblewaite', '2003-01-30', 'US', 'A'),
('Alyda', 'E', 'Blyth', '2000-07-18', 'RU', 'R'),
('Nessy', 'A', 'Mein', '2000-04-05', 'AT', 'L'),
('Kial', null, 'Mallalieu', '2000-06-28', 'DE', 'A'),
('Robina', 'O', 'Depport', '2002-08-24', 'RS', 'A'),
('Cody', 'E', 'Alpine', '2001-04-23', 'PA', 'L'),
('Barbabra', null, 'Corselles', '2001-02-08', 'BR', 'A'),
('Ced', 'H', 'Toffler', '2001-10-16', 'BG', 'R'),
('Kira', 'F', 'Souter', '2000-12-09', 'NL', 'L'),
('Charlotte', 'F', 'Hasnip', '2002-01-15', 'PH', 'A'),
('Clyve', 'U', 'Downing', '2000-03-18', 'PT', 'R'),
('Jaine', 'X', 'Matis', '2003-01-14', 'CZ', 'L'),
('Derwin', 'Y', 'Feld', '2000-09-30', 'BR', 'A'),
('Bonnee', null, 'Saladine', '2000-04-19', 'PA', 'A'),
('Niko', 'H', 'Brooksbie', '2001-12-20', 'HN', 'L'),
('Trent', 'Z', 'Patten', '2000-08-25', 'PE', 'A'),
('Willdon', 'F', 'Dunmore', '2001-02-02', 'PH', 'A'),
('Calida', 'Z', 'Ingliss', '2000-07-31', 'PK', 'A'),
('Olva', 'J', 'Crabbe', '2000-05-11', 'JP', 'L'),
('Keefe', null, 'McGurk', '2001-05-08', 'KP', 'L'),
('Benedicta', null, 'Rolin', '2002-10-25', 'PL', 'A'),
('Orella', 'N', 'Collibear', '2002-07-09', 'PL', 'A'),
('Vi', null, 'Tallis', '2002-01-23', 'CN', 'R'),
('Chaddy', 'M', 'Marris', '2000-08-16', 'MX', 'A'),
('Art', 'F', 'Peatman', '2000-06-06', 'PK', 'A'),
('Ellyn', null, 'Andric', '2001-04-28', 'CO', 'L'),
('Jeramey', 'O', 'Ferenczy', '2000-07-30', 'FI', 'A'),
('Lynnelle', 'Q', 'Glas', '2000-02-25', 'SE', 'A'),
('Francyne', 'T', 'Tilbey', '2000-04-08', 'CN', 'R'),
('Lyssa', 'Z', 'Sallowaye', '2000-11-23', 'CN', 'A'),
('Alidia', 'M', 'Dossett', '2002-01-28', 'ID', 'A'),
('Jobi', 'E', 'Gerram', '2000-12-17', 'YE', 'R'),
('Stoddard', 'O', 'Grayham', '2001-06-05', 'PT', 'R'),
('Maxy', 'U', 'Couroy', '2002-03-29', 'CN', 'A'),
('Barty', null, 'MacKaile', '2001-03-07', 'SE', 'A'),
('Hercule', 'O', 'Gardener', '2001-12-05', 'CN', 'R'),
('Spence', 'Q', 'Budgeon', '2002-01-07', 'PR', 'A'),
('Stu', 'B', 'Colvin', '2002-10-13', 'BR', 'A'),
('Michelina', 'D', 'Bulled', '2001-08-03', 'BR', 'R'),
('Arlana', 'K', 'Money', '2002-04-25', 'ID', 'A'),
('Suzi', 'M', 'Jenson', '2001-12-08', 'GR', 'R'),
('Esra', 'D', 'MacDermand', '2001-08-22', 'CN', 'A'),
('Edita', 'K', 'Stickles', '2002-12-04', 'SE', 'A'),
('Kirbee', 'Y', 'Rist', '2002-02-20', 'ID', 'A'),
('Dud', 'G', 'Fearnill', '2000-04-05', 'PT', 'A'),
('Ambrose', 'E', 'Ilyushkin', '2002-03-30', 'CN', 'R'),
('Holly', 'J', 'Heibel', '2001-12-02', 'PT', 'L'),
('Rowney', null, 'Rootham', '2002-11-26', 'PT', 'A')
;

/* INSERT INTO pitching (player_id, games_pitched, games_won, games_lost, ERA, K, BB) VALUES 
	(100000, 30, 12, 18, 1.59, 87, 28),
	(100001, 38, 1, 37, 4.13, 98, 31),
	(100002, 33, 2, 31, 0.81, 16, 34),
	(100003, 27, 2, 25, 6.22, 59, 40),
	(100004, 35, 15, 20, 3.67, 14, 32),
	(100005, 31, 21, 10, 5.31, 47, 24),
	(100006, 49, 15, 34, 5.04, 96, 39),
	(100007, 37, 4, 33, 3.02, 58, 38),
	(100008, 31, 7, 24, 4.46, 70, 20),
	(100009, 33, 24, 9, 7.8, 61, 38)
	;

INSERT INTO batting (player_id,games_played,AB,H,bat_AVG,BB,K) VALUES
	(100010,43,137,89, 0.650,39, 26),
	(100011,35,180,63, 0.350,28, 15),
	(100012,48,108,81, 0.750,18, 30),
	(100013,44,180,51, 0.283,13, 18),
	(100014,36,141,70, 0.497,23, 20),
	(100015,26,174,87, 0.500,11, 13),
	(100016,33,111,83, 0.748,15, 35),
	(100017,45,269,77, 0.286,12, 44),
	(100018,37,197,63, 0.320,14, 15),
	(100019,47,251,76, 0.303,38, 38),
	(100020,30,116,68, 0.586,16, 30),
	(100021,25,240,77, 0.321,35, 9),
	(100022,44,103,90, 0.874,43, 42),
	(100023,36,149,74, 0.497,32, 15),
	(100024,45,268,85, 0.317,40, 18),
	(100025,32,268,46, 0.172,36, 29),
	(100026,37,98,82, 0.837,13, 24),
	(100027,48,212,64, 0.302,38, 10),
	(100028,38,175,80, 0.457,27, 36),
	(100029,35,278,74, 0.266,38, 17),
	(100030,35,94,87, 0.926,17, 39),
	(100031,49,121,90, 0.744,15, 14),
	(100032,48,207,62, 0.300,24, 13),
	(100033,25,152,72, 0.474,43, 8),
	(100034,34,182,77, 0.423,25, 44),
	(100035,43,209,90, 0.431,29, 38),
	(100036,38,153,51, 0.333,30, 20),
	(100037,41,294,71, 0.242,11, 43),
	(100038,46,105,74, 0.705,29, 37),
	(100039,28,147,83, 0.565,11, 6),
	(100040,46,271,88, 0.325,27, 43),
	(100041,49,114,69, 0.605,13, 7),
	(100042,37,106,87, 0.821,15, 11),
	(100043,27,220,62, 0.282,19, 34),
	(100044,31,121,77, 0.636,12, 15),
	(100045,30,232,71, 0.306,21, 24),
	(100046,31,161,53, 0.329,37, 30),
	(100047,31,233,86, 0.369,10, 39),
	(100048,48,118,56, 0.475,27, 34),
	(100049,46,111,64, 0.577,36, 7)
	; */


INSERT INTO teams (name, abbreviation, games_played, games_won, games_lost) VALUES
	('Abatz','ABA',274,17,257),
	('Ainyx','AIN',163,36,127),
	('Belgi','BEL',192,73,119),
	('Bainyx','BAI',221,30,191),
	('Babbleblab','BAB',263,43,220),
	('Blogtag','BLO',148,14,134),
	('BlogXS','BLX',249,74,175),
	('Bluezoom','BLU',101,30,71),
	('Brainlounge','BRA',206,90,116),
	('Brentlounge','BRE',185,67,118),
	('Brainsphere','BRS',214,98,116),
	('Brainverse','BRV',240,41,199),
	('Browsecat','BRO',171,93,78),
	('Bubblebox','BUB',187,63,124),
	('Buzzbean','BUZ',261,73,188),
	('Camido','CAM',104,17,87),
	('Cogidoo','COG',112,53,59),
	('Dabshots','DAB',142,18,124),
	('Dabvine','DAV',153,25,128),
	('Dazzlesphere','DAZ',285,30,255)
	;
	
INSERT INTO game_schedule(team_A_id,team_B_id,team_A_score,team_B_score,total_innings,schd_date,schd_time,town) VALUES
	(10000,10010,4,2,9,'2017-10-01','17:00:00','Newark'),
	(10001,10011,6,5,9,'2017-10-05','17:00:00','Woodbridge'),
	(10002,10012,3,1,9,'2017-11-01','17:00:00','Harrison'),
	(10003,10013,2,1,11,'2017-10-04','17:00:00','Edison'),
	(10004,10014,9,4,9,'2017-10-08','17:00:00','Union'),
	(10005,10015,2,0,9,'2017-11-01','15:00:00','Elizabeth'),
	(10006,10016,8,7,10,'2017-12-01','17:00:00','Lyndhurst'),
	(10007,10017,10,8,9,'2017-10-11','15:00:00','Nutley')
	;