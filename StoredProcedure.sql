DELIMITER //

CREATE PROCEDURE Match_Details
(IN teamA INT(10),
 IN teamB INT(10),
 IN matchdate DATE,
 IN matchtime TIME,
 IN town VARCHAR(255)
)
BEGIN
INSERT INTO game_schedule (team_A_id,team_B_id,schd_date,schd_time,town) 
SELECT teamA,teamB,matchdate,matchtime,town 
FROM DUAL WHERE NOT EXISTS 
  (SELECT 1 FROM game_schedule 
    WHERE (team_A_id = teamA AND schd_date=matchdate) 
    OR (team_B_id = teamB AND schd_date=matchdate) 
    OR (team_A_id = teamB AND schd_date=matchdate) 
    OR (team_B_id = teamA AND schd_date=matchdate)
   );

END//

DELIMITER ;
