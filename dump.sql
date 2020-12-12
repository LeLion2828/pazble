-- MySQL dump 10.13  Distrib 5.7.32, for Linux (x86_64)
--
-- Host: localhost    Database: pazble
-- ------------------------------------------------------
-- Server version	5.7.32-0ubuntu0.16.04.1

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
-- Table structure for table `acceptingBid`
--

DROP TABLE IF EXISTS `acceptingBid`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `acceptingBid` (
  `AcceptingBid_id` int(11) NOT NULL AUTO_INCREMENT,
  `bid_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`AcceptingBid_id`),
  KEY `bid_id` (`bid_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `acceptingBid_ibfk_1` FOREIGN KEY (`bid_id`) REFERENCES `biding` (`bid_id`),
  CONSTRAINT `acceptingBid_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `acceptingBid`
--

LOCK TABLES `acceptingBid` WRITE;
/*!40000 ALTER TABLE `acceptingBid` DISABLE KEYS */;
INSERT INTO `acceptingBid` VALUES (1,1,1);
/*!40000 ALTER TABLE `acceptingBid` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `biding`
--

DROP TABLE IF EXISTS `biding`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `biding` (
  `bid_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `job_id` int(11) DEFAULT NULL,
  `bid_price` varchar(200) DEFAULT NULL,
  `postjob_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`bid_id`),
  UNIQUE KEY `bid_unique` (`user_id`,`job_id`,`postjob_id`),
  KEY `job_id` (`job_id`),
  KEY `postjob_id` (`postjob_id`),
  CONSTRAINT `biding_ibfk_1` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`job_id`),
  CONSTRAINT `biding_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  CONSTRAINT `biding_ibfk_3` FOREIGN KEY (`postjob_id`) REFERENCES `boss_post_job` (`postjob_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `biding`
--

LOCK TABLES `biding` WRITE;
/*!40000 ALTER TABLE `biding` DISABLE KEYS */;
INSERT INTO `biding` VALUES (1,3,1,'2500',1);
/*!40000 ALTER TABLE `biding` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `boss_post_job`
--

DROP TABLE IF EXISTS `boss_post_job`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `boss_post_job` (
  `postjob_id` int(11) NOT NULL AUTO_INCREMENT,
  `job_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `date_posted` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`postjob_id`),
  KEY `job_id` (`job_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `boss_post_job_ibfk_1` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`job_id`),
  CONSTRAINT `boss_post_job_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `boss_post_job`
--

LOCK TABLES `boss_post_job` WRITE;
/*!40000 ALTER TABLE `boss_post_job` DISABLE KEYS */;
INSERT INTO `boss_post_job` VALUES (1,1,1,'2020-11-25 19:04:45'),(2,2,4,'2020-11-27 09:03:19'),(3,3,1,'2020-12-12 09:24:08');
/*!40000 ALTER TABLE `boss_post_job` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `followsystem`
--

DROP TABLE IF EXISTS `followsystem`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `followsystem` (
  `followsystem_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id_follow` int(11) DEFAULT NULL,
  `user_id_follower` int(11) DEFAULT NULL,
  `status_follow` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`followsystem_id`),
  KEY `user_id_follow` (`user_id_follow`),
  KEY `user_id_follower` (`user_id_follower`),
  CONSTRAINT `followsystem_ibfk_1` FOREIGN KEY (`user_id_follow`) REFERENCES `users` (`user_id`),
  CONSTRAINT `followsystem_ibfk_2` FOREIGN KEY (`user_id_follower`) REFERENCES `users` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `followsystem`
--

LOCK TABLES `followsystem` WRITE;
/*!40000 ALTER TABLE `followsystem` DISABLE KEYS */;
INSERT INTO `followsystem` VALUES (6,1,4,1);
/*!40000 ALTER TABLE `followsystem` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `forgetpwds`
--

DROP TABLE IF EXISTS `forgetpwds`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `forgetpwds` (
  `forgetpwd_id` int(11) NOT NULL AUTO_INCREMENT,
  `mobile_num` varchar(200) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `code` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`forgetpwd_id`),
  UNIQUE KEY `mobile_num` (`mobile_num`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `forgetpwds_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `forgetpwds`
--

LOCK TABLES `forgetpwds` WRITE;
/*!40000 ALTER TABLE `forgetpwds` DISABLE KEYS */;
/*!40000 ALTER TABLE `forgetpwds` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `happenings`
--

DROP TABLE IF EXISTS `happenings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `happenings` (
  `hapen_id` int(11) NOT NULL AUTO_INCREMENT,
  `comments` varchar(255) DEFAULT NULL,
  `posted_time` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`hapen_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `happenings_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `happenings`
--

LOCK TABLES `happenings` WRITE;
/*!40000 ALTER TABLE `happenings` DISABLE KEYS */;
INSERT INTO `happenings` VALUES (1,'hi guys','November 25, 2020, 7:02 pm',1),(2,'test','December 12, 2020, 4:56 am',10),(3,'ggggggg','December 12, 2020, 4:10 pm',1),(4,'tttttt','December 12, 2020, 4:10 pm',1),(5,'koko','December 12, 2020, 4:10 pm',1),(6,'pokli','December 12, 2020, 4:12 pm',1),(7,'tgigig','December 12, 2020, 4:13 pm',1);
/*!40000 ALTER TABLE `happenings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jobs` (
  `job_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) DEFAULT NULL,
  `Description` varchar(200) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `Status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`job_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
INSERT INTO `jobs` VALUES (1,'Painter','two room to paint','Pulnah Lane Riche Terre',1),(2,'Electricity','two rooms in electricity','Moka',0),(3,'test','test','test',0);
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profiles`
--

DROP TABLE IF EXISTS `profiles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `profiles` (
  `profile_id` int(11) NOT NULL AUTO_INCREMENT,
  `service` varchar(200) NOT NULL,
  `category` varchar(200) NOT NULL,
  `description` varchar(255) NOT NULL,
  `rate` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`profile_id`),
  UNIQUE KEY `user_id` (`user_id`),
  CONSTRAINT `profiles_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profiles`
--

LOCK TABLES `profiles` WRITE;
/*!40000 ALTER TABLE `profiles` DISABLE KEYS */;
INSERT INTO `profiles` VALUES (1,'ttt','ttt','tttt','tttt',3);
/*!40000 ALTER TABLE `profiles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ratingworkers`
--

DROP TABLE IF EXISTS `ratingworkers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ratingworkers` (
  `rate_id` int(11) NOT NULL AUTO_INCREMENT,
  `worker_id` int(11) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  PRIMARY KEY (`rate_id`),
  KEY `worker_id` (`worker_id`),
  CONSTRAINT `ratingworkers_ibfk_1` FOREIGN KEY (`worker_id`) REFERENCES `users` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ratingworkers`
--

LOCK TABLES `ratingworkers` WRITE;
/*!40000 ALTER TABLE `ratingworkers` DISABLE KEYS */;
INSERT INTO `ratingworkers` VALUES (1,3,2);
/*!40000 ALTER TABLE `ratingworkers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reply`
--

DROP TABLE IF EXISTS `reply`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reply` (
  `reply_id` int(11) NOT NULL AUTO_INCREMENT,
  `reply_message` varchar(255) DEFAULT NULL,
  `hapen_id` int(11) DEFAULT NULL,
  `replyuserid` int(11) DEFAULT NULL,
  `time_reply` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`reply_id`),
  KEY `hapen_id` (`hapen_id`),
  KEY `replyuserid` (`replyuserid`),
  CONSTRAINT `reply_ibfk_1` FOREIGN KEY (`hapen_id`) REFERENCES `happenings` (`hapen_id`),
  CONSTRAINT `reply_ibfk_2` FOREIGN KEY (`replyuserid`) REFERENCES `users` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reply`
--

LOCK TABLES `reply` WRITE;
/*!40000 ALTER TABLE `reply` DISABLE KEYS */;
INSERT INTO `reply` VALUES (1,'hi man ki rol',1,4,'November 27, 2020, 9:01 am'),(2,'test',1,NULL,'December 11, 2020, 10:10 am'),(3,'dd',1,NULL,'December 11, 2020, 10:10 am'),(4,'sds',1,NULL,'December 11, 2020, 10:11 am'),(5,'',1,NULL,'December 12, 2020, 3:41 am'),(6,'test',1,1,'December 12, 2020, 4:45 am'),(7,'T1',2,10,'December 12, 2020, 6:44 am'),(13,'t5',2,10,'December 12, 2020, 7:47 am'),(16,'',2,NULL,'December 12, 2020, 10:07 am'),(17,'1',2,NULL,'December 12, 2020, 10:07 am'),(20,'yyy',2,1,'December 12, 2020, 2:16 pm'),(22,'hi man ki rol',7,1,'December 12, 2020, 4:13 pm'),(24,'test',7,10,'December 12, 2020, 6:55 pm');
/*!40000 ALTER TABLE `reply` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `uploadproof`
--

DROP TABLE IF EXISTS `uploadproof`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `uploadproof` (
  `uploadproof_id` int(11) NOT NULL AUTO_INCREMENT,
  `paths` varchar(255) DEFAULT NULL,
  `status_proof` tinyint(1) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`uploadproof_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `uploadproof_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `uploadproof`
--

LOCK TABLES `uploadproof` WRITE;
/*!40000 ALTER TABLE `uploadproof` DISABLE KEYS */;
INSERT INTO `uploadproof` VALUES (3,'uploadproof/3/proof5fc0bc3c40e9d9.90714783.jpg',0,3);
/*!40000 ALTER TABLE `uploadproof` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `Firstname` varchar(200) NOT NULL,
  `Lastname` varchar(200) NOT NULL,
  `countryCode` varchar(10) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `password` varchar(255) NOT NULL,
  `usertype` varchar(200) DEFAULT NULL,
  `gravatar` varchar(255) DEFAULT NULL,
  `verify_code` varchar(200) NOT NULL,
  `status_check` tinyint(1) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `phone` (`phone`),
  UNIQUE KEY `verify_code` (`verify_code`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Pravish','Rambo','+230','54884669','$2y$10$y2VEUUvmkzUd1NtiSSRME.kvXihzcrMASXHeCNfoxwUtFnIBNFEgS','client','userpic/1/5fbea9fb080b29.19516900.jpg','5fbea9bcba108',1),(2,'Megna','Ujuda','+230','59215977','$2y$10$aKyT.wivq7ZD.wZeaDPtUuQDxV/Bhrf53YNWT0hzs3YnQFDG.lW.S',NULL,NULL,'JiJtFA',1),(3,'kushal','tawa','+230','57160893','$2y$10$XFVY9aGp6Xqt1U8Rz5irSOIj8lfv8PZMca96gwbYNoH43Tzp/484S','worker','userpic/3/5fc0b98fcb2077.71481031.jpg','jXBhWH',1),(4,'Keshini','tawa','+230','59449491','$2y$10$Q0KKxVIYNziNPCUZ0LYQDO.mRAeYnQbhhkjNYpD6XCIcYN57BhJjq','client','userpic/4/5fc0c05a681793.11301558.png','1gtmta',1),(5,'Adil','Aboobakar','+230','57060668','$2y$10$RphvtddL9gf4RoTRJJjGjO4PpDXAkOtVxDCYUiCTu2sjdXHJYeu5W','worker','userpic/5/5fc0f6fa597490.97264654.jpg','XD3z1V',1),(6,'Adil','Aboobakar','+230','51234567','$2y$10$imNft9a6xhvds4ZpcLxg5OhlQWs2tXrN.xS2ZTkLWX5g2hqiiLjMK',NULL,NULL,'yqsKpf',0),(8,'Ritish','tawa','+230','58061933','$2y$10$cNQ6GHt6qLY6ZZK0FesWMuTBI9IA3qRJIGj2LPsdLCogNBJ0SP8qO',NULL,NULL,'t5cYZM',1),(9,'test','testa','+230','59796708','$2y$10$vchgTWGD4DFJSexzYXYi.uCTMnbpw.kByN.B/ub4iBaYLiMxhUnD6','client','userpic/9/5fd448df802537.19865902.jpg','Zc6jpD',1),(10,'Test','T','+230','59366706','$2y$10$sN4o37S06PiFRxrEJQV5r.HCLUM3eTqxAYHe.J/vv2WMNf9FJ2j3y','worker','userpic/10/5fd44d557fc563.24661318.png','7zGFZu',1),(11,'megna','megna','+230','59255436','$2y$10$3tHr1erKGQTxGeA3pNGNhuDIXn/wuRfQALvKiEaRsuhHwYLiDyFui',NULL,NULL,'I4UA1V',1);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-12-12 18:59:55
