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
  `action` varchar(45) NOT NULL,
  `user` int(11) NOT NULL,
  PRIMARY KEY (`logId`),
  UNIQUE KEY `logId_UNIQUE` (`logId`),
  KEY `user_FK_idx` (`user`),
  CONSTRAINT `user_FK` FOREIGN KEY (`user`) REFERENCES `user` (`userId`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `activitylog`
--

LOCK TABLES `activitylog` WRITE;
/*!40000 ALTER TABLE `activitylog` DISABLE KEYS */;
INSERT INTO `activitylog` VALUES (1,'2017-06-28 04:31:53','Modified Profile',2),(2,'2017-06-28 05:14:58','Modified Profile',2),(3,'2017-06-28 05:15:09','Modified Profile',2),(4,'2017-06-28 07:45:25','Modified Profile of 5',5),(5,'2017-06-28 07:49:01','Modified Profile of CMMV',5),(6,'2017-06-29 12:15:38','Survey Created',2),(7,'2017-06-29 20:30:43','Created Account',15),(8,'2017-06-30 13:34:35','Modified Profile of AnotherSample',2),(9,'2017-06-30 15:03:00','Modified Profile of asdfgqwert',2),(10,'2017-06-30 15:06:07','Modified Profile of AnotherSample',2),(11,'2017-06-30 15:30:01','Modified Profile of CM MMV',2),(12,'2017-07-01 08:54:57','Modified Profile and Status of AnotherSample',2),(13,'2017-07-01 08:55:14','Modified Profile of AnotherSample',2);
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
  `surveyId` int(11) NOT NULL,
  `questionId` int(11) NOT NULL,
  `choiceId` int(11) NOT NULL,
  PRIMARY KEY (`ansId`),
  UNIQUE KEY `ansId_UNIQUE` (`ansId`),
  KEY `surveyFK_idx` (`surveyId`),
  KEY `questionIdFK_idx` (`questionId`),
  KEY `choiceIdFK_idx` (`choiceId`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `answer`
--

LOCK TABLES `answer` WRITE;
/*!40000 ALTER TABLE `answer` DISABLE KEYS */;
INSERT INTO `answer` VALUES (1,33,16,42),(2,33,16,47),(3,33,16,42),(4,33,16,47),(5,33,16,42),(6,33,16,47),(7,33,16,33),(8,33,16,39),(9,33,16,41),(10,33,16,43),(11,33,16,45),(12,34,17,48),(13,34,17,49),(14,34,17,50),(15,34,17,51),(16,30,11,11),(17,30,11,11),(18,30,11,22),(19,30,11,27),(20,30,11,32),(21,36,18,55),(22,30,11,19),(23,30,11,24),(24,30,11,29);
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
  `choiceDescription` varchar(45) NOT NULL,
  PRIMARY KEY (`choiceId`),
  KEY `questionId_idx` (`questionId`)
) ENGINE=MyISAM AUTO_INCREMENT=62 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `choice`
--

LOCK TABLES `choice` WRITE;
/*!40000 ALTER TABLE `choice` DISABLE KEYS */;
INSERT INTO `choice` VALUES (0,1,'wertyui'),(0,2,'fghjkl;'),(1,3,'wertyui'),(1,4,'fghjkl;'),(4,5,'fndlq'),(4,6,'jfpew'),(4,7,'nfp'),(4,8,'nrig'),(5,9,'mgei'),(5,10,'ngi'),(5,11,'noge'),(5,12,'npgf'),(1,13,'NGREIO'),(1,14,'NGR'),(8,15,'NO'),(8,16,'NGIO'),(8,17,'YES'),(9,18,'ngo'),(9,19,'ngow'),(9,20,'nofew'),(9,21,'nofe'),(9,22,'n oew'),(10,23,'mgpo'),(10,24,'mgpow'),(10,25,'nporen'),(10,26,'npin'),(10,27,'ni'),(11,28,'femi'),(11,29,'mgneo'),(11,30,'nge'),(11,31,'ngrio'),(11,32,'gnrio'),(12,33,'a'),(12,34,'b'),(12,35,'c'),(12,36,'d'),(12,37,'I'),(12,38,'know'),(13,39,'I'),(13,40,'know'),(14,41,'I'),(14,42,'know'),(15,43,'dfghj'),(15,44,'dfghj'),(16,45,'fndoig'),(16,46,'ndfong'),(16,47,'ognfdng'),(17,48,'a'),(17,49,'b'),(17,50,'c'),(17,51,'d'),(18,52,'wertyuio'),(18,53,'werty'),(18,54,'uwer'),(18,55,'tyu'),(19,56,'me'),(19,57,'cat'),(19,58,'nya'),(20,59,'Dog'),(20,60,'Bark'),(20,61,'Puppy');
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
  `questionDescription` varchar(45) NOT NULL,
  `surveyId` int(11) NOT NULL,
  PRIMARY KEY (`questionId`,`questionNo`),
  KEY `surveyId_idx` (`surveyId`),
  CONSTRAINT `surveyId` FOREIGN KEY (`surveyId`) REFERENCES `survey` (`surveyId`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `question`
--

LOCK TABLES `question` WRITE;
/*!40000 ALTER TABLE `question` DISABLE KEYS */;
INSERT INTO `question` VALUES (1,'1','faois',27),(2,'1','faois',27),(3,'1','faois',27),(4,'2','What?',27),(5,'3','gmdpi',27),(6,'1','GJREI',28),(7,'1','FNO',29),(8,'1','FNO',29),(9,'1','hfo',30),(10,'2','mgorp',30),(11,'3','mdfopgs',30),(12,'1','What is the question?',33),(13,'1','What is the question?',33),(14,'1','What is the question?',33),(15,'1','rtyu',33),(16,'3','fidslh',33),(17,'1','What is life?',34),(18,'1','wertyuio',36),(19,'1','What is neko?',38),(20,'2','What is Inu',38);
/*!40000 ALTER TABLE `question` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `response`
--

DROP TABLE IF EXISTS `response`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `response` (
  `responseId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `surveyId` int(11) NOT NULL,
  `userResponse` tinytext,
  PRIMARY KEY (`responseId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `response`
--

LOCK TABLES `response` WRITE;
/*!40000 ALTER TABLE `response` DISABLE KEYS */;
INSERT INTO `response` VALUES (1,1,24,'10');
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
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `survey`
--

LOCK TABLES `survey` WRITE;
/*!40000 ALTER TABLE `survey` DISABLE KEYS */;
INSERT INTO `survey` VALUES (19,'sjdfioa','Yes','2017-06-22',0,'Disable'),(20,'sdajf','Yes','2017-06-22',0,'Disable'),(21,'Another Survey Sample','Yes','2017-06-23',2,'Disable'),(22,'','Yes','2017-06-23',2,'Disable'),(23,'','Yes','2017-06-23',2,'Disable'),(24,'v kdsln','Yes','2017-06-23',2,'Disable'),(25,'Sample Survey','No','2017-06-23',1,'Disable'),(26,'Another','Yes','2017-06-23',1,'Disable'),(27,'Questions','Yes','2017-06-23',1,'Disable'),(28,'hahahaha','Yes','2017-06-23',2,'Disable'),(29,'HAHAHAHAH','Yes','2017-06-23',2,'Disable'),(30,'Neko','Yes','2017-06-23',2,'Disable'),(31,'nononono','Yes','2017-06-29',2,'Disable'),(32,'wertyui','Yes','2017-06-29',2,'Disable'),(33,'Querty','Yes','2017-07-01',2,'Disable'),(34,'Fun','Yes','2017-07-03',2,'Disable'),(35,'NTU','Yes','2017-07-03',2,'Disable'),(36,'Hahahahahahhahaha','Yes','2017-07-03',2,'Disable'),(37,'Neko Neko ','Yes','2017-07-03',2,'Disable'),(38,'Meow Neko','Yes','2017-07-03',2,'Disable'),(39,'Another Neko Survey','Yes','2017-07-03',2,'Disable');
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
  `actionSurvey` varchar(45) NOT NULL,
  `user` int(11) NOT NULL,
  PRIMARY KEY (`s_id`),
  KEY `uFK_idx` (`user`),
  CONSTRAINT `uFK` FOREIGN KEY (`user`) REFERENCES `user` (`userId`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `surveylog`
--

LOCK TABLES `surveylog` WRITE;
/*!40000 ALTER TABLE `surveylog` DISABLE KEYS */;
INSERT INTO `surveylog` VALUES (1,'2017-06-28 08:13:17','Delete Survey  ',5),(2,'2017-06-28 08:13:23','Delete Survey  ',5),(3,'2017-06-28 08:16:11','Delete Survey  ',5),(4,'2017-06-28 08:22:01','Delete Survey  ',5),(5,'2017-06-28 08:36:57','Delete Survey  Testtesttest',5),(6,'2017-06-29 20:20:28','Survey Created',2),(7,'2017-07-01 09:28:52',' Survey has been Created',2),(8,'2017-07-03 10:32:25','Added Question for the Survey',2),(9,'2017-07-03 10:49:38','Added Question for the Survey',3),(10,'2017-07-03 13:56:30','Survey has been Created',2),(11,'2017-07-03 13:57:39','Delete Survey  Neko Survey',2),(12,'2017-07-03 13:58:22','Added Question for the Survey',2),(13,'2017-07-03 16:44:00','Survey has been Created',2);
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
  `type` enum('Admin','Respondent') NOT NULL DEFAULT 'Respondent',
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
INSERT INTO `user` VALUES (1,'Admin','Some','Body','IT','a','admin@gmail.com','admin',NULL,'0987654321'),(2,'Admin','Sam','Paul','IT','b','sampaul@gmail.com','admin',NULL,''),(3,'Respondent','New','Person','IT','c','newperson@gmail.com','1234',NULL,''),(4,'Admin','CM M','MV','IT','abc','cv@gmail.com','1234',NULL,'1234567890CV'),(5,'Admin','Catherine','Villacentino','IT','abc','nekoNya@gmail.com','another',NULL,'abcdef123456'),(6,'Respondent','Keyboard','Qwerty','HR','','kb@gmail.com','1234',NULL,'1234567890-'),(7,'Respondent','sdfghjk','qwertyui','IT','none','asd@gmail.com','1234',NULL,'1234567'),(8,'Respondent','poiuyt','poiuyt','IT','b','qwerty@gmail.com','1234',NULL,'09876543'),(9,'Respondent','Sample','Lang','HR','none','samplang@gmail.com','1234',NULL,'3231'),(10,'Admin','Another','Sample','Accounting','abc','anothersample@gmail.com','1234',NULL,'1234565'),(11,'Respondent','ndisof','naoifn','IT','none','nnn@gmail.com','1234',NULL,'23456789'),(12,'Respondent','dfghjkl','ertyuiop','IT','a','gg@gmail.com','1234',NULL,'4567890'),(13,'Respondent','wertyuio','wertyuio','IT','none','wertyuii@gmail.com','1234',NULL,'12345689'),(14,'Admin','asdfg','qwert','IT','none','qa@gmail.com','1234',NULL,'1245'),(15,'Respondent','sdfghjkl','qwertyuiop[','IT','none','asfsdvg@gmail.com','1234',NULL,'1234567890');
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

-- Dump completed on 2017-07-03 20:31:11
