-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: auctionsite
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.30-MariaDB

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
-- Table structure for table `auction`
--

DROP TABLE IF EXISTS `auction`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auction` (
  `auctionid` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(40) NOT NULL,
  `description` varchar(400) DEFAULT NULL,
  `userid` int(11) DEFAULT NULL,
  `startingprice` double DEFAULT NULL,
  `imageext` varchar(5) DEFAULT NULL,
  `highestbid` double DEFAULT NULL,
  `useridhighestbid` int(11) DEFAULT NULL,
  `datetimestamp` datetime DEFAULT NULL,
  `status` varchar(15) DEFAULT NULL,
  `duration` time DEFAULT NULL,
  PRIMARY KEY (`auctionid`),
  KEY `FK_userid` (`userid`),
  CONSTRAINT `FK_userid` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auction`
--

LOCK TABLES `auction` WRITE;
/*!40000 ALTER TABLE `auction` DISABLE KEYS */;
/*!40000 ALTER TABLE `auction` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `imageext`
--

DROP TABLE IF EXISTS `imageext`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `imageext` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `auctionid` int(11) DEFAULT NULL,
  `imgext` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_AuctionID` (`auctionid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `imageext`
--

LOCK TABLES `imageext` WRITE;
/*!40000 ALTER TABLE `imageext` DISABLE KEYS */;
/*!40000 ALTER TABLE `imageext` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prevbids`
--

DROP TABLE IF EXISTS `prevbids`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `prevbids` (
  `auctionID` int(11) DEFAULT NULL,
  `userID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prevbids`
--

LOCK TABLES `prevbids` WRITE;
/*!40000 ALTER TABLE `prevbids` DISABLE KEYS */;
/*!40000 ALTER TABLE `prevbids` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `successfulbids`
--

DROP TABLE IF EXISTS `successfulbids`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `successfulbids` (
  `auctionID` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `price` double DEFAULT NULL,
  `title` varchar(35) DEFAULT NULL,
  `description` varchar(135) DEFAULT NULL,
  PRIMARY KEY (`auctionID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `successfulbids`
--

LOCK TABLES `successfulbids` WRITE;
/*!40000 ALTER TABLE `successfulbids` DISABLE KEYS */;
/*!40000 ALTER TABLE `successfulbids` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `firstname` varchar(40) DEFAULT NULL,
  `lastname` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'K000207591','8c2653c1722b77c1b36010306232c6a0ad8bad8e','willmannix1@gmail.com','william','mannix'),(2,'K0002075911','8c2653c1722b77c1b36010306232c6a0ad8bad8e','willmannix2@gmail.com','john','smith'),(3,'K000207591166','8c2653c1722b77c1b36010306232c6a0ad8bad8e','wols@gmail.com','ewnk','feklwm'),(4,'arwibrde','39387273461f0dbcda6c2db3f3de029042610231','willmannix3@gmail.com','will','mannix'),(5,'arwibrde','e316cfc43aeb7dfa3251581ef18180ff84d4dd4a','willmannix1@gmail.com','will','mannix'),(6,'johnsmith123','8c2653c1722b77c1b36010306232c6a0ad8bad8e','johnsmith@gmail.com','john','smith'),(7,'willmannix123','e316cfc43aeb7dfa3251581ef18180ff84d4dd4a','willmannix1@gmail.com','will','mannix');
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

-- Dump completed on 2018-09-05 12:16:51
