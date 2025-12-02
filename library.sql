Enter password: 
-- MySQL dump 10.13  Distrib 8.0.44, for Linux (x86_64)
--
-- Host: localhost    Database: librarydb
-- ------------------------------------------------------
-- Server version	8.0.44

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `books` (
  `ISBN` varchar(20) NOT NULL,
  `BookTitle` varchar(100) DEFAULT NULL,
  `Author` varchar(100) DEFAULT NULL,
  `Edition` int DEFAULT NULL,
  `Year` int DEFAULT NULL,
  `CategoryID` varchar(3) DEFAULT NULL,
  `Reserved` char(1) DEFAULT 'N',
  PRIMARY KEY (`ISBN`),
  KEY `CategoryID` (`CategoryID`),
  CONSTRAINT `books_ibfk_1` FOREIGN KEY (`CategoryID`) REFERENCES `categories` (`CategoryID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `books`
--

LOCK TABLES `books` WRITE;
/*!40000 ALTER TABLE `books` DISABLE KEYS */;
INSERT INTO `books` VALUES ('093-403992','Computers in Business','Alicia Oneill',3,1997,'003','Y'),('23472-8729','Exploring Peru','Stephanie Birchi',4,2005,'005','N'),('237-34823','Business Strategy','Joe Peppard',2,2002,'002','N'),('23u8-923849','A guide to nutrition','John Thorpe',2,1997,'001','N'),('2983-3494','Cooking for children','Anabelle Sharpe',1,2003,'007','Y'),('82n8-308','computers for idiots','Susan O\'Neill',5,1998,'004','N'),('9283-23984','My life in picture','Kevin Graham',8,2004,'001','N'),('93-004-00','My life in bits','John Smith',2,2001,'003','Y'),('9823-2403-0','DaVinci Code','Dan Brown',3,2003,'008','N'),('9823-98345','How to cook Italian food','Jamie Oliver',2,2005,'007','N'),('9823-98487','Optimising your business','Cleo Blair',1,2001,'002','N'),('98234-029384','My ranch in Texas','George Bush',1,2005,'001','Y'),('988745-234','Tara Road','Maeve Binchy',4,2002,'008','N'),('9987-003982','Shooting History','Jon Snow',1,2003,'001','N');
/*!40000 ALTER TABLE `books` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `CategoryID` varchar(3) NOT NULL,
  `CategoryDesc` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`CategoryID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES ('001','Health'),('002','Business'),('003','Biography'),('004','Technology'),('005','Travel'),('006','Self-Help'),('007','Cookery'),('008','Fiction');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reservations`
--

DROP TABLE IF EXISTS `reservations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reservations` (
  `ISBN` varchar(20) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `ReservedDate` date DEFAULT NULL,
  PRIMARY KEY (`ISBN`,`Username`),
  KEY `Username` (`Username`),
  CONSTRAINT `reservations_ibfk_1` FOREIGN KEY (`ISBN`) REFERENCES `books` (`ISBN`),
  CONSTRAINT `reservations_ibfk_2` FOREIGN KEY (`Username`) REFERENCES `users` (`Username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reservations`
--

LOCK TABLES `reservations` WRITE;
/*!40000 ALTER TABLE `reservations` DISABLE KEYS */;
INSERT INTO `reservations` VALUES ('093-403992','haze1','2025-12-01'),('2983-3494','haze1','2025-12-01'),('93-004-00','tommy100','2025-12-01'),('98234-029384','joecrotty','2008-10-11');
/*!40000 ALTER TABLE `reservations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `Username` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `FirstName` varchar(50) DEFAULT NULL,
  `Surname` varchar(50) DEFAULT NULL,
  `AddressLine` varchar(100) DEFAULT NULL,
  `AddressLine2` varchar(100) DEFAULT NULL,
  `City` varchar(50) DEFAULT NULL,
  `Telephone` varchar(20) DEFAULT NULL,
  `Mobile` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`Username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES ('alanjmckenna','t1234s','Alan','McKenna','38 Cranley Road','Fairview','Dublin','9988377','856625567'),('haze','hazed0m','Ruslan','Ruslan','7 Annabeg','Dublin County','Dublin','1241252151','1251521515'),('haze1','hazed0m','Ruslan','Rohovskyi','7 Annabeg','Dublin County','Dublin','1412512512','5125125151'),('haze2','hazed0m','afssaf','fasfa','fasf','fasf','fasfaf','1513513531','1552151215'),('joecrotty','kj7899','Joseph','Crotty','Apt 5 Clyde Road','Donnybrook','Dublin','8887889','876654456'),('tommy100','123456','Tommy','Behan','14 Hyde Road','Dalkey','Dublin','9983747','876738781');
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

-- Dump completed on 2025-12-02  0:18:02
