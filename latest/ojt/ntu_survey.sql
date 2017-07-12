CREATE DATABASE  IF NOT EXISTS `ntu_survey` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `ntu_survey`;
-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: ntu_survey
-- ------------------------------------------------------
-- Server version	5.7.14

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

--
-- Table structure for table `activitylog`
--

DROP TABLE IF EXISTS `activitylog`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `activitylog` (
  `logId` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL,
  `action` varchar(1000) NOT NULL,
  `user` int(11) NOT NULL,
  PRIMARY KEY (`logId`),
  UNIQUE KEY `logId_UNIQUE` (`logId`),
  KEY `user_FK_idx` (`user`),
  CONSTRAINT `user_FK` FOREIGN KEY (`user`) REFERENCES `user` (`userId`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `activitylog`
--

LOCK TABLES `activitylog` WRITE;
/*!40000 ALTER TABLE `activitylog` DISABLE KEYS */;
INSERT INTO `activitylog` VALUES (1,'2017-06-28 04:31:53','Modified Profile',2),(2,'2017-06-28 05:14:58','Modified Profile',2),(3,'2017-06-28 05:15:09','Modified Profile',2),(4,'2017-06-28 07:45:25','Modified Profile of 5',5),(5,'2017-06-28 07:49:01','Modified Profile of CMMV',5),(6,'2017-06-29 12:15:38','Survey Created',2),(7,'2017-06-29 20:30:43','Created Account',15),(8,'2017-06-30 13:34:35','Modified Profile of AnotherSample',2),(9,'2017-06-30 15:03:00','Modified Profile of asdfgqwert',2),(10,'2017-06-30 15:06:07','Modified Profile of AnotherSample',2),(11,'2017-06-30 15:30:01','Modified Profile of CM MMV',2),(12,'2017-07-01 08:54:57','Modified Profile and Status of AnotherSample',2),(13,'2017-07-01 08:55:14','Modified Profile of AnotherSample',2),(14,'2017-07-06 13:43:23','Modified Profile of NewPerson',2),(15,'2017-07-11 12:59:45','Modified Profile of MeowVillacentino',2),(16,'2017-07-11 16:26:28','Modified Profile and Status of MeowVillacentino',5);
/*!40000 ALTER TABLE `activitylog` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `answer`
--

DROP TABLE IF EXISTS `answer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `answer` (
  `ansId` int(11) NOT NULL AUTO_INCREMENT,
  `questionId` int(11) NOT NULL,
  `choiceId` int(11) NOT NULL,
  `responseId` int(11) NOT NULL,
  PRIMARY KEY (`ansId`),
  UNIQUE KEY `ansId_UNIQUE` (`ansId`),
  KEY `questionIdFK_idx` (`questionId`),
  KEY `choiceIdFK_idx` (`choiceId`)
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `answer`
--

LOCK TABLES `answer` WRITE;
/*!40000 ALTER TABLE `answer` DISABLE KEYS */;
INSERT INTO `answer` VALUES (1,16,70,0),(2,16,70,0),(3,16,70,0),(4,16,70,0),(5,16,70,0),(6,16,70,0),(7,16,70,0),(8,16,70,0),(9,16,70,0),(10,16,70,0),(11,16,70,0),(12,17,48,0),(13,17,48,0),(14,17,48,0),(15,17,48,0),(16,11,70,0),(17,11,70,0),(18,11,70,0),(19,11,70,0),(20,11,70,0),(21,18,54,0),(22,11,70,0),(23,11,70,0),(24,11,70,0),(25,22,70,0),(26,22,70,0),(27,22,70,0),(28,22,70,0),(29,22,70,0),(30,22,70,0),(31,22,70,0),(32,17,48,0),(33,18,54,0),(34,19,58,0),(35,20,63,0),(36,21,69,0),(37,22,70,0),(38,17,48,2),(39,18,54,2),(40,19,58,2),(41,20,63,2),(42,21,69,2),(43,22,70,2),(44,17,48,4),(45,18,54,4),(46,19,58,4),(47,20,63,4),(48,21,69,4),(49,22,70,4),(50,17,48,5),(51,18,54,5),(52,19,58,5),(53,20,63,5),(54,21,69,5),(55,22,70,5),(56,17,48,6),(57,18,54,6),(58,19,58,6),(59,20,63,6),(60,21,69,6),(61,22,70,6);
/*!40000 ALTER TABLE `answer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `choice`
--

DROP TABLE IF EXISTS `choice`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `choice` (
  `questionId` int(11) NOT NULL,
  `choiceId` int(11) NOT NULL AUTO_INCREMENT,
  `choiceDescription` varchar(1000) NOT NULL,
  PRIMARY KEY (`choiceId`),
  KEY `questionId_idx` (`questionId`)
) ENGINE=InnoDB AUTO_INCREMENT=88 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `choice`
--

LOCK TABLES `choice` WRITE;
/*!40000 ALTER TABLE `choice` DISABLE KEYS */;
INSERT INTO `choice` VALUES (0,1,'wertyui'),(0,2,'fghjkl;'),(1,3,'wertyui'),(1,4,'fghjkl;'),(4,5,'fndlq'),(4,6,'jfpew'),(4,7,'nfp'),(4,8,'nrig'),(5,9,'mgei'),(5,10,'ngi'),(5,11,'noge'),(5,12,'npgf'),(1,13,'NGREIO'),(1,14,'NGR'),(8,15,'NO'),(8,16,'NGIO'),(8,17,'YES'),(9,18,'ngo'),(9,19,'ngow'),(9,20,'nofew'),(9,21,'nofe'),(9,22,'n oew'),(10,23,'mgpo'),(10,24,'mgpow'),(10,25,'nporen'),(10,26,'npin'),(10,27,'ni'),(11,28,'femi'),(11,29,'mgneo'),(11,30,'nge'),(11,31,'ngrio'),(11,32,'gnrio'),(12,33,'a'),(12,34,'b'),(12,35,'c'),(12,36,'d'),(12,37,'I'),(12,38,'know'),(13,39,'I'),(13,40,'know'),(14,41,'I'),(14,42,'know'),(15,43,'dfghj'),(15,44,'dfghj'),(16,45,'fndoig'),(16,46,'ndfong'),(16,47,'ognfdng'),(17,48,'1'),(17,49,'10'),(17,50,'100'),(17,51,'0'),(17,52,'none of the above'),(18,53,'5'),(18,54,'2'),(18,55,'3'),(18,56,'10'),(18,57,'20'),(19,58,'Manila'),(19,59,'Beijing'),(19,60,'Tokyo'),(19,61,'Bangkok'),(19,62,'Singapore'),(20,63,'Yes'),(20,64,'No'),(21,65,'My self'),(21,66,'Money'),(21,67,'Family and Friends'),(21,68,'God'),(21,69,'All except Money'),(22,70,'Simple'),(22,71,'Luxury'),(22,72,'Average Life'),(23,73,'Meow is life'),(23,74,'Meow is happiness'),(23,75,'Meow is love'),(14,76,'mewo'),(14,77,'dfsoipn'),(14,78,'dfsoipn'),(15,79,'ctyyguih'),(15,80,' kbkvku'),(15,81,' kbkvku'),(16,82,'jbk'),(16,83,'uo'),(13,84,'neko'),(13,85,'mee'),(13,86,'mee'),(1,87,'neko');
/*!40000 ALTER TABLE `choice` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `question`
--

DROP TABLE IF EXISTS `question`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `question` (
  `questionId` int(11) NOT NULL AUTO_INCREMENT,
  `questionNo` varchar(45) NOT NULL,
  `questionDescription` varchar(1000) NOT NULL,
  `surveyId` int(11) NOT NULL,
  PRIMARY KEY (`questionId`,`questionNo`),
  KEY `surveyId_idx` (`surveyId`),
  CONSTRAINT `surveyId` FOREIGN KEY (`surveyId`) REFERENCES `survey` (`surveyId`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `question`
--

LOCK TABLES `question` WRITE;
/*!40000 ALTER TABLE `question` DISABLE KEYS */;
INSERT INTO `question` VALUES (1,'1','faois',27),(2,'1','faois',27),(3,'1','faois',27),(4,'2','What?',27),(5,'3','gmdpi',27),(6,'1','GJREI',28),(7,'1','FNO',29),(8,'1','FNO',29),(9,'1','hfo',30),(10,'2','mgorp',30),(11,'3','mdfopgs',30),(12,'1','What is the question?',33),(13,'1','What is the question?',33),(14,'1','What is the question?',33),(15,'1','rtyu',33),(16,'3','fidslh',33),(17,'1','What is the first number?',34),(18,'2','What is the next number after the first number?',34),(19,'3','What is the capital of Philippines',34),(20,'4','Do you like animals?',34),(21,'5','What is the most important thing to you?',34),(22,'6','What kind of life you have?',34),(23,'1','Meow',38);
/*!40000 ALTER TABLE `question` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `response`
--

DROP TABLE IF EXISTS `response`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `response` (
  `responseId` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  `surveyId` int(11) NOT NULL,
  PRIMARY KEY (`responseId`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `response`
--

LOCK TABLES `response` WRITE;
/*!40000 ALTER TABLE `response` DISABLE KEYS */;
INSERT INTO `response` VALUES (1,1,24),(2,3,34),(3,3,34),(4,3,34),(5,3,34),(6,3,34);
/*!40000 ALTER TABLE `response` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `survey`
--

DROP TABLE IF EXISTS `survey`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `survey` (
  `surveyId` int(11) NOT NULL AUTO_INCREMENT,
  `surveyTitle` varchar(45) NOT NULL,
  `userRequired` varchar(5) NOT NULL,
  `dateCreated` date NOT NULL,
  `author` int(11) NOT NULL,
  `status` enum('Enable','Disable') DEFAULT 'Disable',
  PRIMARY KEY (`surveyId`),
  UNIQUE KEY `surveyId_UNIQUE` (`surveyId`),
  KEY `user_fk_idx` (`author`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `survey`
--

LOCK TABLES `survey` WRITE;
/*!40000 ALTER TABLE `survey` DISABLE KEYS */;
INSERT INTO `survey` VALUES (18,'Neko Survey','Yes','2017-06-22',0,'Disable'),(21,'Another Survey Sample','Yes','2017-06-23',2,'Disable'),(22,'','Yes','2017-06-23',2,'Disable'),(23,'','Yes','2017-06-23',2,'Disable'),(24,'v kdsln','Yes','2017-06-23',2,'Disable'),(25,'Sample Survey','No','2017-06-23',1,'Disable'),(26,'Another','Yes','2017-06-23',1,'Disable'),(27,'Questions','Yes','2017-06-23',1,'Disable'),(28,'hahahaha','Yes','2017-06-23',2,'Disable'),(29,'HAHAHAHAH','Yes','2017-06-23',2,'Disable'),(30,'Neko','Yes','2017-06-23',2,'Enable'),(31,'nononono','Yes','2017-06-29',2,'Disable'),(32,'wertyui','Yes','2017-06-29',2,'Disable'),(33,'Querty','Yes','2017-07-01',2,'Disable'),(34,'My Survey Example (Sample)','Yes','2017-07-05',2,'Enable'),(35,'\"Survey\"','Yes','2017-07-05',2,'Disable'),(36,'N','Yes','2017-07-05',2,'Disable'),(37,'Ne','Yes','2017-07-05',2,'Disable'),(38,'Meow Moew','Yes','2017-07-05',2,'Disable'),(39,'+survey','Yes','2017-07-05',2,'Disable'),(40,'Meow','Yes','2017-07-05',2,'Disable'),(41,'Cute','No','2017-07-05',2,'Enable');
/*!40000 ALTER TABLE `survey` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `surveylog`
--

DROP TABLE IF EXISTS `surveylog`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `surveylog` (
  `s_id` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL,
  `actionSurvey` varchar(1000) NOT NULL,
  `user` int(11) NOT NULL,
  PRIMARY KEY (`s_id`),
  KEY `uFK_idx` (`user`),
  CONSTRAINT `uFK` FOREIGN KEY (`user`) REFERENCES `user` (`userId`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `surveylog`
--

LOCK TABLES `surveylog` WRITE;
/*!40000 ALTER TABLE `surveylog` DISABLE KEYS */;
INSERT INTO `surveylog` VALUES (1,'2017-06-28 08:13:17','Delete Survey  ',5),(2,'2017-06-28 08:13:23','Delete Survey  ',5),(3,'2017-06-28 08:16:11','Delete Survey  ',5),(4,'2017-06-28 08:22:01','Delete Survey  ',5),(5,'2017-06-28 08:36:57','Delete Survey  Testtesttest',5),(6,'2017-06-29 20:20:28','Survey Created',2),(7,'2017-07-01 09:28:52',' Survey has been Created',2),(8,'2017-07-05 18:01:04','Survey has been Created',2),(9,'2017-07-05 18:09:42','Survey has been Created',2),(10,'2017-07-05 20:07:55','Survey Titled Meow Moew has been Created',2),(11,'2017-07-05 20:13:00','Question/s for Meow has been Created',2),(12,'2017-07-05 20:13:05','Question/s for Meow has been Created',2),(13,'2017-07-05 20:13:48','Survey Titled Cute has been Created',2),(14,'2017-07-05 20:27:05','There are no Question/s created for Cute ',2),(15,'2017-07-06 12:20:06','Modified Survey Cute',2),(16,'2017-07-06 12:20:34','Modified Survey Cute',2),(17,'2017-07-06 12:23:07','Modified Survey Cute',2),(18,'2017-07-06 12:34:30','Modified Survey Cute',2),(19,'2017-07-10 08:55:11','Answered Survey Titled My Survey Example (Sample) ',3),(20,'2017-07-10 08:55:11','Answered Survey Titled My Survey Example (Sample) ',3),(21,'2017-07-10 08:55:11','Answered Survey Titled My Survey Example (Sample) ',3),(22,'2017-07-10 08:55:11','Answered Survey Titled My Survey Example (Sample) ',3),(23,'2017-07-10 08:55:11','Answered Survey Titled My Survey Example (Sample) ',3),(24,'2017-07-10 08:57:44','Answered Survey Titled My Survey Example (Sample) ',3),(25,'2017-07-10 08:57:59','Answered Survey Titled My Survey Example (Sample) ',3),(26,'2017-07-10 09:00:25','Answered Survey Titled My Survey Example (Sample) ',3),(27,'2017-07-10 09:00:25','Answered Survey Titled My Survey Example (Sample) ',3),(28,'2017-07-10 09:00:25','Answered Survey Titled My Survey Example (Sample) ',3),(29,'2017-07-10 09:00:25','Answered Survey Titled My Survey Example (Sample) ',3),(30,'2017-07-10 09:00:25','Answered Survey Titled My Survey Example (Sample) ',3),(31,'2017-07-10 09:00:25','Answered Survey Titled My Survey Example (Sample) ',3),(32,'2017-07-10 09:25:34','Answered Survey Titled My Survey Example (Sample) ',3),(33,'2017-07-10 09:25:34','Answered Survey Titled My Survey Example (Sample) ',3),(34,'2017-07-10 09:25:34','Answered Survey Titled My Survey Example (Sample) ',3),(35,'2017-07-10 09:25:34','Answered Survey Titled My Survey Example (Sample) ',3),(36,'2017-07-10 09:25:34','Answered Survey Titled My Survey Example (Sample) ',3),(37,'2017-07-10 09:25:34','Answered Survey Titled My Survey Example (Sample) ',3),(38,'2017-07-10 09:36:20','Answered Survey Titled My Survey Example (Sample) ',3),(39,'2017-07-10 09:36:20','Answered Survey Titled My Survey Example (Sample) ',3),(40,'2017-07-10 09:36:20','Answered Survey Titled My Survey Example (Sample) ',3),(41,'2017-07-10 09:36:20','Answered Survey Titled My Survey Example (Sample) ',3),(42,'2017-07-10 09:36:20','Answered Survey Titled My Survey Example (Sample) ',3),(43,'2017-07-10 09:36:20','Answered Survey Titled My Survey Example (Sample) ',3),(44,'2017-07-10 13:57:15','Answered Survey Titled My Survey Example (Sample) ',3),(45,'2017-07-10 13:57:15','Answered Survey Titled My Survey Example (Sample) ',3),(46,'2017-07-10 13:57:15','Answered Survey Titled My Survey Example (Sample) ',3),(47,'2017-07-10 13:57:15','Answered Survey Titled My Survey Example (Sample) ',3),(48,'2017-07-10 13:57:15','Answered Survey Titled My Survey Example (Sample) ',3),(49,'2017-07-10 13:57:15','Answered Survey Titled My Survey Example (Sample) ',3),(50,'2017-07-10 13:59:40','Answered Survey Titled My Survey Example (Sample) ',3),(51,'2017-07-10 13:59:40','Answered Survey Titled My Survey Example (Sample) ',3),(52,'2017-07-10 13:59:40','Answered Survey Titled My Survey Example (Sample) ',3),(53,'2017-07-10 13:59:40','Answered Survey Titled My Survey Example (Sample) ',3),(54,'2017-07-10 13:59:40','Answered Survey Titled My Survey Example (Sample) ',3),(55,'2017-07-10 13:59:40','Answered Survey Titled My Survey Example (Sample) ',3),(56,'2017-07-10 14:01:15','Re-Answered Survey Titled My Survey Example (Sample) ',3),(57,'2017-07-10 14:01:15','Re-Answered Survey Titled My Survey Example (Sample) ',3),(58,'2017-07-10 14:01:15','Re-Answered Survey Titled My Survey Example (Sample) ',3),(59,'2017-07-10 14:01:15','Re-Answered Survey Titled My Survey Example (Sample) ',3),(60,'2017-07-10 14:01:15','Re-Answered Survey Titled My Survey Example (Sample) ',3),(61,'2017-07-10 14:01:15','Re-Answered Survey Titled My Survey Example (Sample) ',3),(62,'2017-07-10 14:08:34','Re-Answered Survey Titled My Survey Example (Sample) ',3),(63,'2017-07-10 14:08:34','Re-Answered Survey Titled My Survey Example (Sample) ',3),(64,'2017-07-10 14:08:34','Re-Answered Survey Titled My Survey Example (Sample) ',3),(65,'2017-07-10 14:08:34','Re-Answered Survey Titled My Survey Example (Sample) ',3),(66,'2017-07-10 14:08:34','Re-Answered Survey Titled My Survey Example (Sample) ',3),(67,'2017-07-10 14:08:34','Re-Answered Survey Titled My Survey Example (Sample) ',3),(68,'2017-07-11 16:30:16','Delete Survey  sjdfioa',2),(69,'2017-07-11 16:30:20','Delete Survey  sdajf',2);
/*!40000 ALTER TABLE `surveylog` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  `type` enum('Admin','Supervisor','Respondent') NOT NULL DEFAULT 'Respondent',
  `firstName` varchar(45) NOT NULL,
  `lastName` varchar(45) NOT NULL,
  `department` varchar(45) NOT NULL,
  `team` varchar(45) NOT NULL DEFAULT 'none',
  `email` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `status` binary(1) DEFAULT NULL,
  `empNum` varchar(45) NOT NULL,
  PRIMARY KEY (`userId`),
  UNIQUE KEY `userid_UNIQUE` (`userId`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'Admin','Some','Body','IT','a','admin@gmail.com','admin',NULL,'0987654321'),(2,'Admin','Sam','Paul','IT','b','sampaul@gmail.com','admin',NULL,''),(3,'Respondent','New','Person','IT','c','newperson@gmail.com','1234',NULL,'1234567890-09876'),(4,'Supervisor','Meow','Villacentino','IT','abc','cv@gmail.com','1234',NULL,'1234567890CV'),(5,'Admin','Catherine','Villacentino','IT','abc','nekoNya@gmail.com','another',NULL,'abcdef123456'),(6,'Respondent','Keyboard','Qwerty','HR','','kb@gmail.com','1234',NULL,'1234567890-'),(7,'Respondent','sdfghjk','qwertyui','IT','none','asd@gmail.com','1234',NULL,'1234567'),(8,'Respondent','poiuyt','poiuyt','IT','b','qwerty@gmail.com','1234',NULL,'09876543'),(9,'Respondent','Sample','Lang','HR','none','samplang@gmail.com','1234',NULL,'3231'),(10,'Admin','Another','Sample','Accounting','abc','anothersample@gmail.com','1234',NULL,'1234565'),(11,'Respondent','ndisof','naoifn','IT','none','nnn@gmail.com','1234',NULL,'23456789'),(12,'Respondent','dfghjkl','ertyuiop','IT','a','gg@gmail.com','1234',NULL,'4567890'),(13,'Respondent','wertyuio','wertyuio','IT','none','wertyuii@gmail.com','1234',NULL,'12345689'),(14,'Admin','asdfg','qwert','IT','none','qa@gmail.com','1234',NULL,'1245'),(15,'Respondent','sdfghjkl','qwertyuiop[','IT','none','asfsdvg@gmail.com','1234',NULL,'1234567890');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-07-11 16:37:29
