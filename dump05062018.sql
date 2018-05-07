-- MySQL dump 10.13  Distrib 5.7.21, for Linux (x86_64)
--
-- Host: localhost    Database: Baseball
-- ------------------------------------------------------
-- Server version       5.7.21-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
SET @MYSQLDUMP_TEMP_LOG_BIN = @@SESSION.SQL_LOG_BIN;
SET @@SESSION.SQL_LOG_BIN= 0;

--
-- GTID state at the beginning of the backup
--

SET @@GLOBAL.GTID_PURGED='3c359d98-50b4-11e8-8b27-129c13d49efa:1-45,
8a73eded-d05b-4cf1-8d09-e1cf3f3c41d9:1-8';

--
-- Current Database: `Baseball`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `Baseball` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `Baseball`;

--
-- Table structure for table `game_schedule`
--

DROP TABLE IF EXISTS `game_schedule`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `game_schedule` (
  `id` varchar(255) GENERATED ALWAYS AS (concat('TA',`team_A_id`,'TB',`team_B_id`,'DT',`schd_date`)) VIRTUAL,
  `team_A_id` int(10) unsigned NOT NULL,
  `team_B_id` int(10) unsigned NOT NULL,
  `team_A_score` tinyint(3) unsigned DEFAULT NULL,
  `team_B_score` tinyint(3) unsigned DEFAULT NULL,
  `total_innings` tinyint(3) unsigned DEFAULT NULL,
  `schd_date` date NOT NULL,
  `schd_time` time NOT NULL,
  `town` varchar(255) NOT NULL,
  PRIMARY KEY (`team_A_id`,`team_B_id`,`schd_date`),
  KEY `team_B_id` (`team_B_id`),
  CONSTRAINT `game_schedule_ibfk_1` FOREIGN KEY (`team_A_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `game_schedule_ibfk_2` FOREIGN KEY (`team_B_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `game_schedule`
--

LOCK TABLES `game_schedule` WRITE;
/*!40000 ALTER TABLE `game_schedule` DISABLE KEYS */;
INSERT INTO `game_schedule` (`team_A_id`, `team_B_id`, `team_A_score`, `team_B_score`, `total_innings`, `schd_date`, `schd_time`, `town`) VALUES ,10000,10001,8,1,9,'2018-12-30','17:00:00','Union'),,10000,10001,8,1,9,'2018-12-30','17:00:0
0','Union'),10000,10010,4,2,9,'2017-10-01','17:00:00','Newark'),,10000,10001,8,1,9,'2018-12-30','17:00:00','Union'),10000,10010,4,2,9,'2017-10-01','17:00:00','Newark'),10001,10003,2,15,9,'2018-12-31','17:00:00','Linden'),,10000,10001,8,1
,9,'2018-12-30','17:00:00','Union'),10000,10010,4,2,9,'2017-10-01','17:00:00','Newark'),10001,10003,2,15,9,'2018-12-31','17:00:00','Linden'),10001,10011,6,5,9,'2017-10-05','17:00:00','Woodbridge'),,10000,10001,8,1,9,'2018-12-30','17:00:0
0','Union'),10000,10010,4,2,9,'2017-10-01','17:00:00','Newark'),10001,10003,2,15,9,'2018-12-31','17:00:00','Linden'),10001,10011,6,5,9,'2017-10-05','17:00:00','Woodbridge'),10002,10012,3,1,9,'2017-11-01','17:00:00','Harrison'),,10000,100
01,8,1,9,'2018-12-30','17:00:00','Union'),10000,10010,4,2,9,'2017-10-01','17:00:00','Newark'),10001,10003,2,15,9,'2018-12-31','17:00:00','Linden'),10001,10011,6,5,9,'2017-10-05','17:00:00','Woodbridge'),10002,10012,3,1,9,'2017-11-01','17
:00:00','Harrison'),10003,10013,2,1,11,'2017-10-04','17:00:00','Edison'),,10000,10001,8,1,9,'2018-12-30','17:00:00','Union'),10000,10010,4,2,9,'2017-10-01','17:00:00','Newark'),10001,10003,2,15,9,'2018-12-31','17:00:00','Linden'),10001,1
0011,6,5,9,'2017-10-05','17:00:00','Woodbridge'),10002,10012,3,1,9,'2017-11-01','17:00:00','Harrison'),10003,10013,2,1,11,'2017-10-04','17:00:00','Edison'),10004,10014,9,4,9,'2017-10-08','17:00:00','Union'),,10000,10001,8,1,9,'2018-12-30
','17:00:00','Union'),10000,10010,4,2,9,'2017-10-01','17:00:00','Newark'),10001,10003,2,15,9,'2018-12-31','17:00:00','Linden'),10001,10011,6,5,9,'2017-10-05','17:00:00','Woodbridge'),10002,10012,3,1,9,'2017-11-01','17:00:00','Harrison'),
10003,10013,2,1,11,'2017-10-04','17:00:00','Edison'),10004,10014,9,4,9,'2017-10-08','17:00:00','Union'),10005,10015,2,0,9,'2017-11-01','15:00:00','Elizabeth'),,10000,10001,8,1,9,'2018-12-30','17:00:00','Union'),10000,10010,4,2,9,'2017-10
-01','17:00:00','Newark'),10001,10003,2,15,9,'2018-12-31','17:00:00','Linden'),10001,10011,6,5,9,'2017-10-05','17:00:00','Woodbridge'),10002,10012,3,1,9,'2017-11-01','17:00:00','Harrison'),10003,10013,2,1,11,'2017-10-04','17:00:00','Edis
on'),10004,10014,9,4,9,'2017-10-08','17:00:00','Union'),10005,10015,2,0,9,'2017-11-01','15:00:00','Elizabeth'),10006,10016,8,7,10,'2017-12-01','17:00:00','Lyndhurst'),,10000,10001,8,1,9,'2018-12-30','17:00:00','Union'),10000,10010,4,2,9,
'2017-10-01','17:00:00','Newark'),10001,10003,2,15,9,'2018-12-31','17:00:00','Linden'),10001,10011,6,5,9,'2017-10-05','17:00:00','Woodbridge'),10002,10012,3,1,9,'2017-11-01','17:00:00','Harrison'),10003,10013,2,1,11,'2017-10-04','17:00:0
0','Edison'),10004,10014,9,4,9,'2017-10-08','17:00:00','Union'),10005,10015,2,0,9,'2017-11-01','15:00:00','Elizabeth'),10006,10016,8,7,10,'2017-12-01','17:00:00','Lyndhurst'),10007,10016,10,2,9,'2013-08-21','17:00:00','Jersey City'),,100
00,10001,8,1,9,'2018-12-30','17:00:00','Union'),10000,10010,4,2,9,'2017-10-01','17:00:00','Newark'),10001,10003,2,15,9,'2018-12-31','17:00:00','Linden'),10001,10011,6,5,9,'2017-10-05','17:00:00','Woodbridge'),10002,10012,3,1,9,'2017-11-0
1','17:00:00','Harrison'),10003,10013,2,1,11,'2017-10-04','17:00:00','Edison'),10004,10014,9,4,9,'2017-10-08','17:00:00','Union'),10005,10015,2,0,9,'2017-11-01','15:00:00','Elizabeth'),10006,10016,8,7,10,'2017-12-01','17:00:00','Lyndhurs
t'),10007,10016,10,2,9,'2013-08-21','17:00:00','Jersey City'),10007,10017,10,8,9,'2017-10-11','15:00:00','Nutley'),,10000,10001,8,1,9,'2018-12-30','17:00:00','Union'),10000,10010,4,2,9,'2017-10-01','17:00:00','Newark'),10001,10003,2,15,9
,'2018-12-31','17:00:00','Linden'),10001,10011,6,5,9,'2017-10-05','17:00:00','Woodbridge'),10002,10012,3,1,9,'2017-11-01','17:00:00','Harrison'),10003,10013,2,1,11,'2017-10-04','17:00:00','Edison'),10004,10014,9,4,9,'2017-10-08','17:00:0
0','Union'),10005,10015,2,0,9,'2017-11-01','15:00:00','Elizabeth'),10006,10016,8,7,10,'2017-12-01','17:00:00','Lyndhurst'),10007,10016,10,2,9,'2013-08-21','17:00:00','Jersey City'),10007,10017,10,8,9,'2017-10-11','15:00:00','Nutley'),100
12,10016,5,4,9,'2017-11-10','17:00:00','Garfield'),,10000,10001,8,1,9,'2018-12-30','17:00:00','Union'),10000,10010,4,2,9,'2017-10-01','17:00:00','Newark'),10001,10003,2,15,9,'2018-12-31','17:00:00','Linden'),10001,10011,6,5,9,'2017-10-05
','17:00:00','Woodbridge'),10002,10012,3,1,9,'2017-11-01','17:00:00','Harrison'),10003,10013,2,1,11,'2017-10-04','17:00:00','Edison'),10004,10014,9,4,9,'2017-10-08','17:00:00','Union'),10005,10015,2,0,9,'2017-11-01','15:00:00','Elizabeth
'),10006,10016,8,7,10,'2017-12-01','17:00:00','Lyndhurst'),10007,10016,10,2,9,'2013-08-21','17:00:00','Jersey City'),10007,10017,10,8,9,'2017-10-11','15:00:00','Nutley'),10012,10016,5,4,9,'2017-11-10','17:00:00','Garfield'),10013,10012,2
,1,10,'2018-12-26','17:00:00','Bayonne'),,10000,10001,8,1,9,'2018-12-30','17:00:00','Union'),10000,10010,4,2,9,'2017-10-01','17:00:00','Newark'),10001,10003,2,15,9,'2018-12-31','17:00:00','Linden'),10001,10011,6,5,9,'2017-10-05','17:00:0
0','Woodbridge'),10002,10012,3,1,9,'2017-11-01','17:00:00','Harrison'),10003,10013,2,1,11,'2017-10-04','17:00:00','Edison'),10004,10014,9,4,9,'2017-10-08','17:00:00','Union'),10005,10015,2,0,9,'2017-11-01','15:00:00','Elizabeth'),10006,1
0016,8,7,10,'2017-12-01','17:00:00','Lyndhurst'),10007,10016,10,2,9,'2013-08-21','17:00:00','Jersey City'),10007,10017,10,8,9,'2017-10-11','15:00:00','Nutley'),10012,10016,5,4,9,'2017-11-10','17:00:00','Garfield'),10013,10012,2,1,10,'201
8-12-26','17:00:00','Bayonne'),10015,10016,3,5,10,'2016-12-28','17:00:00','Paramus'),,10000,10001,8,1,9,'2018-12-30','17:00:00','Union'),10000,10010,4,2,9,'2017-10-01','17:00:00','Newark'),10001,10003,2,15,9,'2018-12-31','17:00:00','Lind
en'),10001,10011,6,5,9,'2017-10-05','17:00:00','Woodbridge'),10002,10012,3,1,9,'2017-11-01','17:00:00','Harrison'),10003,10013,2,1,11,'2017-10-04','17:00:00','Edison'),10004,10014,9,4,9,'2017-10-08','17:00:00','Union'),10005,10015,2,0,9,
'2017-11-01','15:00:00','Elizabeth'),10006,10016,8,7,10,'2017-12-01','17:00:00','Lyndhurst'),10007,10016,10,2,9,'2013-08-21','17:00:00','Jersey City'),10007,10017,10,8,9,'2017-10-11','15:00:00','Nutley'),10012,10016,5,4,9,'2017-11-10','1
7:00:00','Garfield'),10013,10012,2,1,10,'2018-12-26','17:00:00','Bayonne'),10015,10016,3,5,10,'2016-12-28','17:00:00','Paramus'),10015,10016,NULL,NULL,NULL,'2019-03-29','17:00:00','Rutherford'),,10000,10001,8,1,9,'2018-12-30','17:00:00',
'Union'),10000,10010,4,2,9,'2017-10-01','17:00:00','Newark'),10001,10003,2,15,9,'2018-12-31','17:00:00','Linden'),10001,10011,6,5,9,'2017-10-05','17:00:00','Woodbridge'),10002,10012,3,1,9,'2017-11-01','17:00:00','Harrison'),10003,10013,2
,1,11,'2017-10-04','17:00:00','Edison'),10004,10014,9,4,9,'2017-10-08','17:00:00','Union'),10005,10015,2,0,9,'2017-11-01','15:00:00','Elizabeth'),10006,10016,8,7,10,'2017-12-01','17:00:00','Lyndhurst'),10007,10016,10,2,9,'2013-08-21','17
:00:00','Jersey City'),10007,10017,10,8,9,'2017-10-11','15:00:00','Nutley'),10012,10016,5,4,9,'2017-11-10','17:00:00','Garfield'),10013,10012,2,1,10,'2018-12-26','17:00:00','Bayonne'),10015,10016,3,5,10,'2016-12-28','17:00:00','Paramus')
,10015,10016,NULL,NULL,NULL,'2019-03-29','17:00:00','Rutherford'),10015,10019,NULL,NULL,NULL,'2018-12-26','17:00:00','Bayonne'),,10000,10001,8,1,9,'2018-12-30','17:00:00','Union'),10000,10010,4,2,9,'2017-10-01','17:00:00','Newark'),10001
,10003,2,15,9,'2018-12-31','17:00:00','Linden'),10001,10011,6,5,9,'2017-10-05','17:00:00','Woodbridge'),10002,10012,3,1,9,'2017-11-01','17:00:00','Harrison'),10003,10013,2,1,11,'2017-10-04','17:00:00','Edison'),10004,10014,9,4,9,'2017-10
-08','17:00:00','Union'),10005,10015,2,0,9,'2017-11-01','15:00:00','Elizabeth'),10006,10016,8,7,10,'2017-12-01','17:00:00','Lyndhurst'),10007,10016,10,2,9,'2013-08-21','17:00:00','Jersey City'),10007,10017,10,8,9,'2017-10-11','15:00:00',
'Nutley'),10012,10016,5,4,9,'2017-11-10','17:00:00','Garfield'),10013,10012,2,1,10,'2018-12-26','17:00:00','Bayonne'),10015,10016,3,5,10,'2016-12-28','17:00:00','Paramus'),10015,10016,NULL,NULL,NULL,'2019-03-29','17:00:00','Rutherford'),
10015,10019,NULL,NULL,NULL,'2018-12-26','17:00:00','Bayonne'),10016,10018,NULL,NULL,NULL,'2017-10-11','17:00:00','Clifton'),,10000,10001,8,1,9,'2018-12-30','17:00:00','Union'),10000,10010,4,2,9,'2017-10-01','17:00:00','Newark'),10001,100
03,2,15,9,'2018-12-31','17:00:00','Linden'),10001,10011,6,5,9,'2017-10-05','17:00:00','Woodbridge'),10002,10012,3,1,9,'2017-11-01','17:00:00','Harrison'),10003,10013,2,1,11,'2017-10-04','17:00:00','Edison'),10004,10014,9,4,9,'2017-10-08'
,'17:00:00','Union'),10005,10015,2,0,9,'2017-11-01','15:00:00','Elizabeth'),10006,10016,8,7,10,'2017-12-01','17:00:00','Lyndhurst'),10007,10016,10,2,9,'2013-08-21','17:00:00','Jersey City'),10007,10017,10,8,9,'2017-10-11','15:00:00','Nut
ley'),10012,10016,5,4,9,'2017-11-10','17:00:00','Garfield'),10013,10012,2,1,10,'2018-12-26','17:00:00','Bayonne'),10015,10016,3,5,10,'2016-12-28','17:00:00','Paramus'),10015,10016,NULL,NULL,NULL,'2019-03-29','17:00:00','Rutherford'),1001
5,10019,NULL,NULL,NULL,'2018-12-26','17:00:00','Bayonne'),10016,10018,NULL,NULL,NULL,'2017-10-11','17:00:00','Clifton'),10016,10019,NULL,NULL,NULL,'2018-12-28','17:00:00','Kearny'),,10000,10001,8,1,9,'2018-12-30','17:00:00','Union'),1000
0,10010,4,2,9,'2017-10-01','17:00:00','Newark'),10001,10003,2,15,9,'2018-12-31','17:00:00','Linden'),10001,10011,6,5,9,'2017-10-05','17:00:00','Woodbridge'),10002,10012,3,1,9,'2017-11-01','17:00:00','Harrison'),10003,10013,2,1,11,'2017-1
0-04','17:00:00','Edison'),10004,10014,9,4,9,'2017-10-08','17:00:00','Union'),10005,10015,2,0,9,'2017-11-01','15:00:00','Elizabeth'),10006,10016,8,7,10,'2017-12-01','17:00:00','Lyndhurst'),10007,10016,10,2,9,'2013-08-21','17:00:00','Jers
ey City'),10007,10017,10,8,9,'2017-10-11','15:00:00','Nutley'),10012,10016,5,4,9,'2017-11-10','17:00:00','Garfield'),10013,10012,2,1,10,'2018-12-26','17:00:00','Bayonne'),10015,10016,3,5,10,'2016-12-28','17:00:00','Paramus'),10015,10016,
NULL,NULL,NULL,'2019-03-29','17:00:00','Rutherford'),10015,10019,NULL,NULL,NULL,'2018-12-26','17:00:00','Bayonne'),10016,10018,NULL,NULL,NULL,'2017-10-11','17:00:00','Clifton'),10016,10019,NULL,NULL,NULL,'2018-12-28','17:00:00','Kearny')
,10018,10019,NULL,NULL,NULL,'2017-12-30','16:00:00','Newark'),,10000,10001,8,1,9,'2018-12-30','17:00:00','Union'),10000,10010,4,2,9,'2017-10-01','17:00:00','Newark'),10001,10003,2,15,9,'2018-12-31','17:00:00','Linden'),10001,10011,6,5,9,
'2017-10-05','17:00:00','Woodbridge'),10002,10012,3,1,9,'2017-11-01','17:00:00','Harrison'),10003,10013,2,1,11,'2017-10-04','17:00:00','Edison'),10004,10014,9,4,9,'2017-10-08','17:00:00','Union'),10005,10015,2,0,9,'2017-11-01','15:00:00'
,'Elizabeth'),10006,10016,8,7,10,'2017-12-01','17:00:00','Lyndhurst'),10007,10016,10,2,9,'2013-08-21','17:00:00','Jersey City'),10007,10017,10,8,9,'2017-10-11','15:00:00','Nutley'),10012,10016,5,4,9,'2017-11-10','17:00:00','Garfield'),10
013,10012,2,1,10,'2018-12-26','17:00:00','Bayonne'),10015,10016,3,5,10,'2016-12-28','17:00:00','Paramus'),10015,10016,NULL,NULL,NULL,'2019-03-29','17:00:00','Rutherford'),10015,10019,NULL,NULL,NULL,'2018-12-26','17:00:00','Bayonne'),1001
6,10018,NULL,NULL,NULL,'2017-10-11','17:00:00','Clifton'),10016,10019,NULL,NULL,NULL,'2018-12-28','17:00:00','Kearny'),10018,10019,NULL,NULL,NULL,'2017-12-30','16:00:00','Newark'),10018,10019,NULL,NULL,NULL,'2018-12-29','17:00:00','Bayon
ne'),,10000,10001,8,1,9,'2018-12-30','17:00:00','Union'),10000,10010,4,2,9,'2017-10-01','17:00:00','Newark'),10001,10003,2,15,9,'2018-12-31','17:00:00','Linden'),10001,10011,6,5,9,'2017-10-05','17:00:00','Woodbridge'),10002,10012,3,1,9,'
2017-11-01','17:00:00','Harrison'),10003,10013,2,1,11,'2017-10-04','17:00:00','Edison'),10004,10014,9,4,9,'2017-10-08','17:00:00','Union'),10005,10015,2,0,9,'2017-11-01','15:00:00','Elizabeth'),10006,10016,8,7,10,'2017-12-01','17:00:00',
'Lyndhurst'),10007,10016,10,2,9,'2013-08-21','17:00:00','Jersey City'),10007,10017,10,8,9,'2017-10-11','15:00:00','Nutley'),10012,10016,5,4,9,'2017-11-10','17:00:00','Garfield'),10013,10012,2,1,10,'2018-12-26','17:00:00','Bayonne'),10015
,10016,3,5,10,'2016-12-28','17:00:00','Paramus'),10015,10016,NULL,NULL,NULL,'2019-03-29','17:00:00','Rutherford'),10015,10019,NULL,NULL,NULL,'2018-12-26','17:00:00','Bayonne'),10016,10018,NULL,NULL,NULL,'2017-10-11','17:00:00','Clifton')
,10016,10019,NULL,NULL,NULL,'2018-12-28','17:00:00','Kearny'),10018,10019,NULL,NULL,NULL,'2017-12-30','16:00:00','Newark'),10018,10019,NULL,NULL,NULL,'2018-12-29','17:00:00','Bayonne'),10018,10019,NULL,NULL,NULL,'2018-12-31','17:00:00','
Bayonne'),,10000,10001,8,1,9,'2018-12-30','17:00:00','Union'),10000,10010,4,2,9,'2017-10-01','17:00:00','Newark'),10001,10003,2,15,9,'2018-12-31','17:00:00','Linden'),10001,10011,6,5,9,'2017-10-05','17:00:00','Woodbridge'),10002,10012,3,
1,9,'2017-11-01','17:00:00','Harrison'),10003,10013,2,1,11,'2017-10-04','17:00:00','Edison'),10004,10014,9,4,9,'2017-10-08','17:00:00','Union'),10005,10015,2,0,9,'2017-11-01','15:00:00','Elizabeth'),10006,10016,8,7,10,'2017-12-01','17:00
:00','Lyndhurst'),10007,10016,10,2,9,'2013-08-21','17:00:00','Jersey City'),10007,10017,10,8,9,'2017-10-11','15:00:00','Nutley'),10012,10016,5,4,9,'2017-11-10','17:00:00','Garfield'),10013,10012,2,1,10,'2018-12-26','17:00:00','Bayonne'),
10015,10016,3,5,10,'2016-12-28','17:00:00','Paramus'),10015,10016,NULL,NULL,NULL,'2019-03-29','17:00:00','Rutherford'),10015,10019,NULL,NULL,NULL,'2018-12-26','17:00:00','Bayonne'),10016,10018,NULL,NULL,NULL,'2017-10-11','17:00:00','Clif
ton'),10016,10019,NULL,NULL,NULL,'2018-12-28','17:00:00','Kearny'),10018,10019,NULL,NULL,NULL,'2017-12-30','16:00:00','Newark'),10018,10019,NULL,NULL,NULL,'2018-12-29','17:00:00','Bayonne'),10018,10019,NULL,NULL,NULL,'2018-12-31','17:00:
00','Bayonne'),10019,10020,NULL,NULL,NULL,'2018-12-26','17:00:00','Bayonne'),,10000,10001,8,1,9,'2018-12-30','17:00:00','Union'),10000,10010,4,2,9,'2017-10-01','17:00:00','Newark'),10001,10003,2,15,9,'2018-12-31','17:00:00','Linden'),100
01,10011,6,5,9,'2017-10-05','17:00:00','Woodbridge'),10002,10012,3,1,9,'2017-11-01','17:00:00','Harrison'),10003,10013,2,1,11,'2017-10-04','17:00:00','Edison'),10004,10014,9,4,9,'2017-10-08','17:00:00','Union'),10005,10015,2,0,9,'2017-11
-01','15:00:00','Elizabeth'),10006,10016,8,7,10,'2017-12-01','17:00:00','Lyndhurst'),10007,10016,10,2,9,'2013-08-21','17:00:00','Jersey City'),10007,10017,10,8,9,'2017-10-11','15:00:00','Nutley'),10012,10016,5,4,9,'2017-11-10','17:00:00'
,'Garfield'),10013,10012,2,1,10,'2018-12-26','17:00:00','Bayonne'),10015,10016,3,5,10,'2016-12-28','17:00:00','Paramus'),10015,10016,NULL,NULL,NULL,'2019-03-29','17:00:00','Rutherford'),10015,10019,NULL,NULL,NULL,'2018-12-26','17:00:00',
'Bayonne'),10016,10018,NULL,NULL,NULL,'2017-10-11','17:00:00','Clifton'),10016,10019,NULL,NULL,NULL,'2018-12-28','17:00:00','Kearny'),10018,10019,NULL,NULL,NULL,'2017-12-30','16:00:00','Newark'),10018,10019,NULL,NULL,NULL,'2018-12-29','1
7:00:00','Bayonne'),10018,10019,NULL,NULL,NULL,'2018-12-31','17:00:00','Bayonne'),10019,10020,NULL,NULL,NULL,'2018-12-26','17:00:00','Bayonne'),10020,10019,NULL,NULL,NULL,'2018-12-31','17:00:00','Bayonne');
/*!40000 ALTER TABLE `game_schedule` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `players`
--

DROP TABLE IF EXISTS `players`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `players` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `f_name` varchar(255) NOT NULL,
  `m_initial` char(5) DEFAULT NULL,
  `l_name` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `country` varchar(255) NOT NULL,
  `bats_throws` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=100050 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `players`
--

LOCK TABLES `players` WRITE;
/*!40000 ALTER TABLE `players` DISABLE KEYS */;
INSERT INTO `players` VALUES (100000,'Isobel','L','Hugli','2002-09-07','MU','R'),(100001,'Nanice','J','Stickles','2001-05-06','UA','L'),(100002,'Rosemary','O','Hebblewaite','2003-01-30','US','A'),(100003,'Alyda','E','Blyth','2000-07-18',
'RU','R'),(100004,'Nessy','A','Mein','2000-04-05','AT','L'),(100005,'Kial',NULL,'Mallalieu','2000-06-28','DE','A'),(100006,'Robina','O','Depport','2002-08-24','RS','A'),(100007,'Cody','E','Alpine','2001-04-23','PA','L'),(100008,'Barbabra
',NULL,'Corselles','2001-02-08','BR','A'),(100009,'Ced','H','Toffler','2001-10-16','BG','R'),(100010,'Kira','F','Souter','2000-12-09','NL','L'),(100011,'Charlotte','F','Hasnip','2002-01-15','PH','A'),(100012,'Clyve','U','Downing','2000-0
3-18','PT','R'),(100013,'Jaine','X','Matis','2003-01-14','CZ','L'),(100014,'Derwin','Y','Feld','2000-09-30','BR','A'),(100015,'Bonnee',NULL,'Saladine','2000-04-19','PA','A'),(100016,'Niko','H','Brooksbie','2001-12-20','HN','L'),(100017,'
Trent','Z','Patten','2000-08-25','PE','A'),(100018,'Willdon','F','Dunmore','2001-02-02','PH','A'),(100019,'Calida','Z','Ingliss','2000-07-31','PK','A'),(100020,'Olva','J','Crabbe','2000-05-11','JP','L'),(100021,'Keefe',NULL,'McGurk','200
1-05-08','KP','L'),(100022,'Benedicta',NULL,'Rolin','2002-10-25','PL','A'),(100023,'Orella','N','Collibear','2002-07-09','PL','A'),(100024,'Vi',NULL,'Tallis','2002-01-23','CN','R'),(100025,'Chaddy','M','Marris','2000-08-16','MX','A'),(10
0026,'Art','F','Peatman','2000-06-06','PK','A'),(100027,'Ellyn',NULL,'Andric','2001-04-28','CO','L'),(100028,'Jeramey','O','Ferenczy','2000-07-30','FI','A'),(100029,'Lynnelle','Q','Glas','2000-02-25','SE','A'),(100030,'Francyne','T','Til
bey','2000-04-08','CN','R'),(100031,'Lyssa','Z','Sallowaye','2000-11-23','CN','A'),(100032,'Alidia','M','Dossett','2002-01-28','ID','A'),(100033,'Jobi','E','Gerram','2000-12-17','YE','R'),(100034,'Stoddard','O','Grayham','2001-06-05','PT
','R'),(100035,'Maxy','U','Couroy','2002-03-29','CN','A'),(100036,'Barty',NULL,'MacKaile','2001-03-07','SE','A'),(100037,'Hercule','O','Gardener','2001-12-05','CN','R'),(100038,'Spence','Q','Budgeon','2002-01-07','PR','A'),(100039,'Stu',
'B','Colvin','2002-10-13','BR','A'),(100040,'Michelina','D','Bulled','2001-08-03','BR','R'),(100041,'Arlana','K','Money','2002-04-25','ID','A'),(100042,'Suzi','M','Jenson','2001-12-08','GR','R'),(100043,'Esra','D','MacDermand','2001-08-2
2','CN','A'),(100044,'Edita','K','Stickles','2002-12-04','SE','A'),(100045,'Kirbee','Y','Rist','2002-02-20','ID','A'),(100046,'Dud','G','Fearnill','2000-04-05','PT','A'),(100047,'Ambrose','E','Ilyushkin','2002-03-30','CN','R'),(100048,'H
olly','J','Heibel','2001-12-02','PT','L'),(100049,'Rowney',NULL,'Rootham','2002-11-26','PT','A');
/*!40000 ALTER TABLE `players` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `team_roster_per_season`
--

DROP TABLE IF EXISTS `team_roster_per_season`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `team_roster_per_season` (
  `player_id` int(10) unsigned NOT NULL,
  `team_id` int(10) unsigned NOT NULL,
  `season_year` year(4) NOT NULL,
  PRIMARY KEY (`player_id`,`team_id`,`season_year`),
  KEY `team_id` (`team_id`),
  CONSTRAINT `team_roster_per_season_ibfk_1` FOREIGN KEY (`player_id`) REFERENCES `players` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `team_roster_per_season_ibfk_2` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `team_roster_per_season`
--

LOCK TABLES `team_roster_per_season` WRITE;
/*!40000 ALTER TABLE `team_roster_per_season` DISABLE KEYS */;
INSERT INTO `team_roster_per_season` VALUES (100000,10000,2015),(100001,10000,2015),(100002,10000,2015),(100003,10000,2015),(100004,10000,2015),(100010,10002,2019),(100011,10002,2019),(100013,10006,2012),(100045,10017,2014),(100046,10017
,2014),(100005,10020,2016),(100006,10020,2016),(100007,10020,2016),(100008,10020,2016),(100009,10020,2016);
/*!40000 ALTER TABLE `team_roster_per_season` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `teams`
--

DROP TABLE IF EXISTS `teams`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `teams` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `abbreviation` varchar(255) NOT NULL,
  `games_played` smallint(5) unsigned NOT NULL,
  `games_won` smallint(5) unsigned NOT NULL,
  `games_lost` smallint(5) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10021 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teams`
--

LOCK TABLES `teams` WRITE;
/*!40000 ALTER TABLE `teams` DISABLE KEYS */;
INSERT INTO `teams` VALUES (10000,'Abatz','ABA',274,17,257),(10001,'Ainyx','AIN',163,36,127),(10002,'Belgi','BEL',192,73,119),(10003,'Bainyx','BAI',221,30,191),(10004,'Babbleblab','BAB',263,43,220),(10005,'Blogtag','BLO',148,14,134),(100
06,'BlogXS','BLX',249,74,175),(10007,'Bluezoom','BLU',101,30,71),(10008,'Brainlounge','BRA',206,90,116),(10009,'Brentlounge','BRE',185,67,118),(10010,'Brainsphere','BRS',214,98,116),(10011,'Brainverse','BRV',240,41,199),(10012,'Browsecat
','BRO',171,93,78),(10013,'Bubblebox','BUB',187,63,124),(10014,'Buzzbean','BUZ',261,73,188),(10015,'Camido','CAM',104,17,87),(10016,'Cogidoo','COG',112,53,59),(10017,'Dabshots','DAB',142,18,124),(10018,'Dabvine','DAV',153,25,128),(10019,
'Dazzlesphere','DAZ',285,30,255),(10020,'Aguilas Cibaenas','AC',20,19,1);
/*!40000 ALTER TABLE `teams` ENABLE KEYS */;
UNLOCK TABLES;
SET @@SESSION.SQL_LOG_BIN = @MYSQLDUMP_TEMP_LOG_BIN;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-05-06 23:06:18
