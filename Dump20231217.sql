-- MariaDB dump 10.18  Distrib 10.4.17-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: bookings
-- ------------------------------------------------------
-- Server version	10.4.17-MariaDB

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
-- Table structure for table `available_times`
--

DROP TABLE IF EXISTS `available_times`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `available_times` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_time` datetime DEFAULT NULL,
  `participants` int(11) DEFAULT NULL,
  `max_participants` int(11) DEFAULT NULL,
  `fk_therapy` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_available_times_therapy` (`fk_therapy`),
  CONSTRAINT `fk_available_times_therapy` FOREIGN KEY (`fk_therapy`) REFERENCES `therapy` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `available_times`
--

LOCK TABLES `available_times` WRITE;
/*!40000 ALTER TABLE `available_times` DISABLE KEYS */;
INSERT INTO `available_times` VALUES (1,'2023-12-08 12:00:00',NULL,15,1),(2,'2023-12-23 13:31:00',NULL,12,2),(3,'2023-12-22 18:27:00',NULL,2,4),(4,'2023-12-21 15:39:00',NULL,12,2),(5,'2023-12-31 19:42:00',NULL,20,6),(6,'2023-12-09 12:14:00',NULL,3,3),(7,'2023-12-29 19:39:00',NULL,2,1),(8,'2023-12-29 19:39:00',NULL,32,1),(9,'2024-01-01 19:40:00',NULL,1,1),(10,'2024-01-07 19:40:00',NULL,24,1),(11,'2023-12-22 19:40:00',NULL,245,1),(12,'2023-12-31 19:43:00',NULL,4,4);
/*!40000 ALTER TABLE `available_times` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `people`
--

DROP TABLE IF EXISTS `people`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `people` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(75) CHARACTER SET latin1 COLLATE latin1_danish_ci DEFAULT NULL,
  `last_name` varchar(75) CHARACTER SET latin1 COLLATE latin1_danish_ci DEFAULT NULL,
  `email` varchar(320) CHARACTER SET latin1 COLLATE latin1_danish_ci DEFAULT NULL,
  `phone_number` int(11) DEFAULT NULL,
  `dmy` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `problem` text CHARACTER SET latin1 COLLATE latin1_danish_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `people`
--

LOCK TABLES `people` WRITE;
/*!40000 ALTER TABLE `people` DISABLE KEYS */;
INSERT INTO `people` VALUES (1,'Magnus','Holm','magnusthestrup@hotmail.com',60,'2023-12-14',NULL,'testing stuff'),(2,'Magnus','Holm','magnusthestrup26@gmail.com',60688984,'2023-12-08',NULL,'testsetsteststestsetsts'),(3,'Magnus','Holm','magnusthestrup26@gmail.com',60688984,'2023-12-31',NULL,'ABCDEFGHIJKLMNOPQRSTUVWXYZÆØÅABCDEFGHIJKLMNOPQRSTUVWXYZÆØÅABCDEFGHIJKLMNOPQRSTUVWXYZÆØÅABCDEFGHIJKLMNOPQRSTUVWXYZÆØÅABCDEFGHIJKLMNOPQRSTUVWXYZÆØÅABCDEFGHIJKLMNOPQRSTUVWXYZÆØÅABCDEFGHIJKLMNOPQRSTUVWXYZÆØÅABCDEFGHIJKLMNOPQRSTUVWXYZÆØÅ'),(4,'Magnus','Holm','magnusthestrup26@gmail.com',60688984,'2023-12-31',NULL,'ABCDEFGHIJKLMNOPQRSTUVWXYZÆØÅABCDEFGHIJKLMNOPQRSTUVWXYZÆØÅABCDEFGHIJKLMNOPQRSTUVWXYZÆØÅABCDEFGHIJKLMNOPQRSTUVWXYZÆØÅABCDEFGHIJKLMNOPQRSTUVWXYZÆØÅABCDEFGHIJKLMNOPQRSTUVWXYZÆØÅABCDEFGHIJKLMNOPQRSTUVWXYZÆØÅABCDEFGHIJKLMNOPQRSTUVWXYZÆØÅ'),(5,'Lars','Tyndskid','LarsTyndskid@mark.dk',80000085,NULL,NULL,NULL),(6,'Magnus','Holm','magnusthestrup@hotmail.com',60688984,NULL,NULL,NULL),(7,'Magnus','Holm','magnusthestrup@hotmail.com',60688984,NULL,NULL,NULL),(8,'Magnus','Holm','magnusthestrup@hotmail.com',60688984,NULL,NULL,NULL);
/*!40000 ALTER TABLE `people` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `therapy`
--

DROP TABLE IF EXISTS `therapy`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `therapy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(75) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `therapy`
--

LOCK TABLES `therapy` WRITE;
/*!40000 ALTER TABLE `therapy` DISABLE KEYS */;
INSERT INTO `therapy` VALUES (1,'Terapeutisk Yin Yoga'),(2,'Kropsorienteret Meditation'),(3,'Nervesystemsregulering'),(4,'Kvindecirkler'),(5,'Traumeinformeret Gruppeforløb'),(6,'En ny Livsfortælling');
/*!40000 ALTER TABLE `therapy` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-12-17 19:46:55
