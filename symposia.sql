-- MySQL dump 10.13  Distrib 8.0.32, for Linux (x86_64)
--
-- Host: localhost    Database: symposia
-- ------------------------------------------------------
-- Server version	8.0.32-0ubuntu0.20.04.2

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
-- Table structure for table `Biology`
--

DROP TABLE IF EXISTS `Biology`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Biology` (
  `uname` varchar(100) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `code` varchar(2) DEFAULT NULL,
  UNIQUE KEY `code` (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Biology`
--

LOCK TABLES `Biology` WRITE;
/*!40000 ALTER TABLE `Biology` DISABLE KEYS */;
INSERT INTO `Biology` VALUES ('admin','Anatomy','a'),('admin','Respiration','b'),('admin','Pathology','c'),('admin','Ortho','d'),('admin','Dental','e'),('admin','Cardiology','f'),('admin','Neurology','g');
/*!40000 ALTER TABLE `Biology` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Chemistry`
--

DROP TABLE IF EXISTS `Chemistry`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Chemistry` (
  `uname` varchar(100) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `code` varchar(2) DEFAULT NULL,
  UNIQUE KEY `code` (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Chemistry`
--

LOCK TABLES `Chemistry` WRITE;
/*!40000 ALTER TABLE `Chemistry` DISABLE KEYS */;
INSERT INTO `Chemistry` VALUES ('admin','Organic Chemistry','a'),('admin','Inorganic Chemistry','b'),('admin','Quantum Chemistry','c');
/*!40000 ALTER TABLE `Chemistry` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Mathematics`
--

DROP TABLE IF EXISTS `Mathematics`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Mathematics` (
  `uname` varchar(100) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `code` varchar(2) DEFAULT NULL,
  UNIQUE KEY `code` (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Mathematics`
--

LOCK TABLES `Mathematics` WRITE;
/*!40000 ALTER TABLE `Mathematics` DISABLE KEYS */;
INSERT INTO `Mathematics` VALUES ('admin','Geometry','a'),('admin','Trigonometry','b'),('admin','Calculus','c'),('admin','Mensuration','d');
/*!40000 ALTER TABLE `Mathematics` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Physics`
--

DROP TABLE IF EXISTS `Physics`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Physics` (
  `uname` varchar(100) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `code` varchar(2) DEFAULT NULL,
  UNIQUE KEY `code` (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Physics`
--

LOCK TABLES `Physics` WRITE;
/*!40000 ALTER TABLE `Physics` DISABLE KEYS */;
INSERT INTO `Physics` VALUES ('admin','Nuclear Physics','a'),('admin','Atomic Physics','b'),('admin','Solid State Physics','c'),('admin','Particle Physics','d');
/*!40000 ALTER TABLE `Physics` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `accommodation`
--

DROP TABLE IF EXISTS `accommodation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `accommodation` (
  `uname` varchar(100) DEFAULT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `FunctionName` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `accommodation`
--

LOCK TABLES `accommodation` WRITE;
/*!40000 ALTER TABLE `accommodation` DISABLE KEYS */;
INSERT INTO `accommodation` VALUES ('admin','DAECC Guest House','DAECC'),('admin','Postgraduate Hostel','PGHostel'),('admin','Hotel : The Regenza by Tunga','Tunga'),('admin','Hotel : The Jewel of Chembur','JewelOfChembur');
/*!40000 ALTER TABLE `accommodation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `assoc_array`
--

DROP TABLE IF EXISTS `assoc_array`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `assoc_array` (
  `id` int NOT NULL AUTO_INCREMENT,
  `array` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `assoc_array`
--

LOCK TABLES `assoc_array` WRITE;
/*!40000 ALTER TABLE `assoc_array` DISABLE KEYS */;
/*!40000 ALTER TABLE `assoc_array` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `committees`
--

DROP TABLE IF EXISTS `committees`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `committees` (
  `uname` varchar(50) DEFAULT NULL,
  `CounOffName` varchar(100) DEFAULT NULL,
  `CounOffAffil` varchar(255) DEFAULT NULL,
  `CounMemName` varchar(100) DEFAULT NULL,
  `CounMemAffil` varchar(255) DEFAULT NULL,
  `OrgMemName` varchar(100) DEFAULT NULL,
  `OrgMemAffil` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `committees`
--

LOCK TABLES `committees` WRITE;
/*!40000 ALTER TABLE `committees` DISABLE KEYS */;
INSERT INTO `committees` VALUES ('admin','Prof. Balram Bhargava','New Delhi','Prof. Anil Bhardwaj','Ahmedabad','S. M. Yusuf','BARC, Mumbai'),('admin','Prof. Ajoy Kumar Ghatak','New Delhi','Prof. Dhrubajyoti Chattopadhyay','Kolkata','L. M. Pant','BARC, Mumbai'),('admin','Prof. Manju Sharma ','New Delhi','Prof. Srinivasa Rao Cherukumalli','Telangana','D. V. Udupa','BARC, Mumbai'),('admin','Prof. Madhu Dikshit','Lucknow','Prof. Pramod Kumar Garg','New Delhi','A. K. Gupta','BARC, Mumbai'),('admin','Prof. U.C. Srivastava','Prayagraj','Prof. Anup Kumar Ghosh ','New Delhi','K. K. Yadav','BARC, Mumbai'),('admin','Prof. Vinod Kumar Singh','Kanpur','Prof. Vimal Kumar Jain','Mumbai','T. Sakuntala ','BARC, Mumbai'),('admin','Prof. Jayesh R. Bellare','Mumbai','Prof. Arun Kumar Pandey ','Bhopal','',''),('admin','Prof. Madhoolika Agrawal','Varanasi','Prof. Anirban Pathak','Noida','',''),('admin','','','Prof. Sheo Mohan Prasad','Prayagraj','',''),('admin','','','Prof. Latha Rangan','Guwahati','',''),('admin','','','Prof. Vijayalakshmi Ravindranath','Bangalore','',''),('admin','','','Prof. Rohit Srivastava','Mumbai','',''),('admin','','','Prof. Nikhil Tandon','New Delhi','',''),('admin','','','Prof. Seikh Mohammad Yusuf','Mumbai','','');
/*!40000 ALTER TABLE `committees` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contactus`
--

DROP TABLE IF EXISTS `contactus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contactus` (
  `uname` varchar(20) DEFAULT NULL,
  `Post` varchar(255) DEFAULT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Email` varchar(150) DEFAULT NULL,
  `ContactNumber` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contactus`
--

LOCK TABLES `contactus` WRITE;
/*!40000 ALTER TABLE `contactus` DISABLE KEYS */;
INSERT INTO `contactus` VALUES ('admin','Convener','S. M. Yusuf','smyusuf@barc.gov.in',''),('admin','Member','L. M. Pant','lmpant@barc.gov.in',''),('admin','Member','D. V. Udupa','dudupa@barc.gov.in',''),('admin','Member','A. K. Gupta','anit@barc.gov.in',''),('admin','Member','K. K. Yadav','kkyadav@barc.gov.in',''),('admin','Member','T Sakuntala','sakuntl@barc.gov.in','');
/*!40000 ALTER TABLE `contactus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contributions`
--

DROP TABLE IF EXISTS `contributions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contributions` (
  `uname` varchar(100) DEFAULT NULL,
  `Topic` varchar(255) DEFAULT NULL,
  `Category` varchar(255) DEFAULT NULL,
  `Title` varchar(500) DEFAULT NULL,
  `Filename` varchar(255) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `AuthorNamesList` varchar(1000) DEFAULT NULL,
  `AuthorEmailsList` varchar(1000) DEFAULT NULL,
  `refereeName` varchar(4) DEFAULT NULL,
  `remarks` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contributions`
--

LOCK TABLES `contributions` WRITE;
/*!40000 ALTER TABLE `contributions` DISABLE KEYS */;
INSERT INTO `contributions` VALUES ('admin','','','','',NULL,NULL,NULL,NULL,NULL),('rsehgal','A','d','Title is now change : Hello from paritcles in physics','rsehgal_paper_A_d_1.pdf','submitted','Ayush Sehgal','ayush.sehgal',NULL,NULL),('rsehgal','C','c','Hello from Calculus in math','rsehgal_paper_C_c_1.pdf','Poster','Raman Sehgal,Shachi Sehgal,Ayush Sehgal','raman.sehgal@gmail.com,shachi.sehgal@gmail.com,ayush.sehgal@gmail.com','RSE','I thinks it is a very good work. Keep on doing like this'),('rsehgal','D','a','CHANGE TO CHANGE THE TITLE AND FILEhello from ana in bio','rsehgal_paper_D_a_1.pdf','submitted','AYUSH SEHGAL,ARYAN SEHGAL','AYUSH.SEHGAL@GMAIL.COM,ARYAN.SEHGAL@GMAIL.COM',NULL,NULL),('rsehgal','A','c','Hello from SSP ','rsehgal_paper_A_c_1.pdf','Rejected','dfdsfdsf','fdsfdsfds','RSE','Try to do it in a better way, and better luck next time');
/*!40000 ALTER TABLE `contributions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menuitems`
--

DROP TABLE IF EXISTS `menuitems`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `menuitems` (
  `item` varchar(255) DEFAULT NULL,
  `value` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menuitems`
--

LOCK TABLES `menuitems` WRITE;
/*!40000 ALTER TABLE `menuitems` DISABLE KEYS */;
INSERT INTO `menuitems` VALUES ('Home',1),('About',1),('Committees',1),('Signup',0),('Login',1),('Submissions',1),('Accommodation',1),('Contact',1),('Upload_Contribution',0),('Resubmit_Contribution',0),('View_Contribution',0),('DAECC',1),('Tunga',1),('JewelOfChembur',1),('PGHostel',1),('AuthorLogin',0),('RefereeLogin',0),('Topic',0),('Venue',1),('Poster',0);
/*!40000 ALTER TABLE `menuitems` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `refereeList`
--

DROP TABLE IF EXISTS `refereeList`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `refereeList` (
  `uname` varchar(4) DEFAULT NULL,
  `passwd` varchar(255) DEFAULT NULL,
  `refereeEmail` varchar(255) DEFAULT NULL,
  `refereeName` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `refereeList`
--

LOCK TABLES `refereeList` WRITE;
/*!40000 ALTER TABLE `refereeList` DISABLE KEYS */;
INSERT INTO `refereeList` VALUES ('RSE','ramansehgal','sc.ramansehgal@gmail.com','Raman Sehgal'),('ASE','ayushsehgal','ayush.sehgal@gmail.com','Ayush Sehgal'),('SSE','shachisehgal','shachi.sehgal@gmail.com','Shachi Sehgal');
/*!40000 ALTER TABLE `refereeList` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `symposium`
--

DROP TABLE IF EXISTS `symposium`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `symposium` (
  `uname` varchar(50) DEFAULT NULL,
  `volume` int DEFAULT NULL,
  `title` varchar(500) DEFAULT NULL,
  `venue` varchar(500) DEFAULT NULL,
  `datefrom` date DEFAULT NULL,
  `dateto` date DEFAULT NULL,
  `reg_start_date` date DEFAULT NULL,
  `reg_end_date` date DEFAULT NULL,
  `contrib_start_date` date DEFAULT NULL,
  `contrib_end_date` date DEFAULT NULL,
  `finsup_start_date` date DEFAULT NULL,
  `finsup_end_date` date DEFAULT NULL,
  `city` varchar(150) DEFAULT NULL,
  `state` varchar(150) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `about` longtext,
  `UploadLocation` varchar(254) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `symposium`
--

LOCK TABLES `symposium` WRITE;
/*!40000 ALTER TABLE `symposium` DISABLE KEYS */;
INSERT INTO `symposium` VALUES ('admin',1,'The National Academy of Sciences, India <br/><small><b>93<sup>rd</sup> Annual session & Symposium<br/>December 03-05,2023</b></small>','DAE Convention Center, Anushaktinagar','2023-12-03','2023-12-05','2023-10-01','2023-10-10','2023-09-01','2023-09-10','2023-09-01','2023-09-10','Mumbai','Maharashtra','India',NULL,'Uploads');
/*!40000 ALTER TABLE `symposium` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `testuser`
--

DROP TABLE IF EXISTS `testuser`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `testuser` (
  `id` int DEFAULT NULL,
  `FirstName` varchar(255) DEFAULT NULL,
  `LastName` varchar(244) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `testuser`
--

LOCK TABLES `testuser` WRITE;
/*!40000 ALTER TABLE `testuser` DISABLE KEYS */;
INSERT INTO `testuser` VALUES (1,'Raman','Sehgal'),(2,'Ayush','Sehgal'),(2,'Shachi','Sehgal');
/*!40000 ALTER TABLE `testuser` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `topics`
--

DROP TABLE IF EXISTS `topics`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `topics` (
  `uname` varchar(100) DEFAULT NULL,
  `Topic` varchar(255) DEFAULT NULL,
  `code` varchar(2) DEFAULT NULL,
  UNIQUE KEY `code` (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `topics`
--

LOCK TABLES `topics` WRITE;
/*!40000 ALTER TABLE `topics` DISABLE KEYS */;
INSERT INTO `topics` VALUES ('admin','Physics','A'),('admin','Chemistry','B'),('admin','Mathematics','C'),('admin','Biology','D');
/*!40000 ALTER TABLE `topics` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_credentials`
--

DROP TABLE IF EXISTS `user_credentials`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_credentials` (
  `uname` varchar(20) NOT NULL,
  `passwd` varchar(150) DEFAULT NULL,
  `firstname` varchar(150) DEFAULT NULL,
  `lastname` varchar(150) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`uname`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_credentials`
--

LOCK TABLES `user_credentials` WRITE;
/*!40000 ALTER TABLE `user_credentials` DISABLE KEYS */;
INSERT INTO `user_credentials` VALUES ('ayush','dfjskdjfksdjf','Ayush','Sehgal','ayush.sehgal@gmail.com'),('rsehgal','rs','Raman','Sehgal','sc.ramansehgal@gmail.com'),('toro','toro','Toro','Sehgal','toro.sehgal@gmail.com');
/*!40000 ALTER TABLE `user_credentials` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `uname` varchar(20) NOT NULL,
  `passwd` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`uname`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'rsehgal','Hsuya^123');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

UNLOCK TABLES;

DROP TABLE IF EXISTS `HowToReach`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `HowToReach` (
  `id` int DEFAULT NULL,
  `How_To_Reach` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `HowToReach`
--

LOCK TABLES `HowToReach` WRITE;
/*!40000 ALTER TABLE `HowToReach` DISABLE KEYS */;
INSERT INTO `HowToReach` VALUES (1,'<h2 class=\"text-danger\"><b>Airports in Mumbai<br/> (15 km from the Venue / Accommodation)</b></h2>'),(11,'<h3 class=\"text-primary\">Chhatrapati Shivaji Maharaj International Airport, Sahar (Terminal 2 : Domestic and International Flights) </h3>'),(12,'<h3 class=\"text-primary\">Mumbai Domestic Airport, Santa Cruz (Terminal 1 : Only Domestic Flights) </h3>'),(NULL,NULL),(NULL,NULL),(2,'<h2 class=\"text-danger\"><b>Main Railway Stations in Mumbai<br/> (from 7 km to 13 km from the Venue/Accommodation) </b></h2>'),(21,'<h3 class=\"text-primary\">Chhatrapati Shivaji Terminus, Station code: CST </h3>'),(22,'<h3 class=\"text-primary\">Dadar Railway Station, Station code: DR, DDR </h3>'),(23,'<h3 class=\"text-primary\">Lokmanya Tilak Terminus, Station code: LTT </h3>'),(24,'<h3 class=\"text-primary\">Mumbai Central Railway Station, Station Code : MMTC </h3>'),(25,'<h3 class=\"text-primary\">Panvel Railway Station, Station Code: PL (suburban)/PNVL (mainline) </h3>'),(10000,''),(10000,''),(3,'<h3 class=\"text-dark\"><b>The nearest local train station to Anushaktinagar is Mankhurd, on the harbour line </b></h3>'),(NULL,NULL),(NULL,NULL);

UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-05-25 13:16:35
