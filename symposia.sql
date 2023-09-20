-- MySQL dump 10.13  Distrib 8.0.34, for Linux (x86_64)
--
-- Host: localhost    Database: symposia
-- ------------------------------------------------------
-- Server version	8.0.34-0ubuntu0.20.04.1

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
-- Table structure for table `CommAdv`
--

DROP TABLE IF EXISTS `CommAdv`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `CommAdv` (
  `name` varchar(255) DEFAULT NULL,
  `affil` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `CommAdv`
--

LOCK TABLES `CommAdv` WRITE;
/*!40000 ALTER TABLE `CommAdv` DISABLE KEYS */;
INSERT INTO `CommAdv` VALUES ('Mr. Advisor','Basic institure of Technology'),('Dr. Curious','Neurological institure of Technology');
/*!40000 ALTER TABLE `CommAdv` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `CommOrg`
--

DROP TABLE IF EXISTS `CommOrg`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `CommOrg` (
  `name` varchar(255) DEFAULT NULL,
  `affil` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `CommOrg`
--

LOCK TABLES `CommOrg` WRITE;
/*!40000 ALTER TABLE `CommOrg` DISABLE KEYS */;
INSERT INTO `CommOrg` VALUES ('Dr. ABC DEF','Institute of JKL LMNO'),('Dr. Cap holder','Qwerty University'),('Mr. Organizer','XYZ institure of Technology'),('Mr. Super researcher','OPQR research institute');
/*!40000 ALTER TABLE `CommOrg` ENABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `accommodation`
--

LOCK TABLES `accommodation` WRITE;
/*!40000 ALTER TABLE `accommodation` DISABLE KEYS */;
INSERT INTO `accommodation` VALUES ('admin','Hotel : The Regenza by Tunga','Tunga'),('admin','Abbott Hotel','Abbott'),('admin','Yogi Executive','Yogi');
/*!40000 ALTER TABLE `accommodation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admin_credentials`
--

DROP TABLE IF EXISTS `admin_credentials`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admin_credentials` (
  `uname` varchar(4) NOT NULL,
  `passwd` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_credentials`
--

LOCK TABLES `admin_credentials` WRITE;
/*!40000 ALTER TABLE `admin_credentials` DISABLE KEYS */;
INSERT INTO `admin_credentials` VALUES ('ADM','admin@nasi2023','sc.ramansehgal@gmail.com','Raman Sehgal');
/*!40000 ALTER TABLE `admin_credentials` ENABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `assoc_array`
--

LOCK TABLES `assoc_array` WRITE;
/*!40000 ALTER TABLE `assoc_array` DISABLE KEYS */;
/*!40000 ALTER TABLE `assoc_array` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bankdetails`
--

DROP TABLE IF EXISTS `bankdetails`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `bankdetails` (
  `bankname` varchar(150) DEFAULT NULL,
  `branch` varchar(150) DEFAULT NULL,
  `accountname` varchar(150) DEFAULT NULL,
  `accountnum` varchar(50) DEFAULT NULL,
  `ifsc` varchar(20) DEFAULT NULL,
  `swiftcode` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bankdetails`
--

LOCK TABLES `bankdetails` WRITE;
/*!40000 ALTER TABLE `bankdetails` DISABLE KEYS */;
INSERT INTO `bankdetails` VALUES ('STATE BANK OF INDIA','BARC BRANCH','ANNUAL SESSION OF NASI-2023','41994119191','SBIN0001268','SBININBB508');
/*!40000 ALTER TABLE `bankdetails` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `uname` varchar(100) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `code` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES ('admin','Agriculture & Food Security','A'),('admin','Drug-Pharmacy & Bio-applications for Security','B'),('admin','Forest, Climate & Environmental Security','C'),('admin','Energy Security','D'),('admin','Electronics & Cyber Security','E'),('admin','Space Security','F'),('admin','Medical & Health Security','G');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `committees`
--

LOCK TABLES `committees` WRITE;
/*!40000 ALTER TABLE `committees` DISABLE KEYS */;
INSERT INTO `committees` VALUES ('admin','Prof. Balram Bhargava','New Delhi','Prof. Anil Bhardwaj','Ahmedabad','S. M. Yusuf','BARC, Mumbai'),('admin','Prof. Ajoy Kumar Ghatak','New Delhi','Prof. Dhrubajyoti Chattopadhyay','Kolkata','L. M. Pant','BARC, Mumbai'),('admin','Prof. Manju Sharma ','New Delhi','Prof. Srinivasa Rao Cherukumalli','Telangana','D. V. Udupa','BARC, Mumbai'),('admin','Prof. Madhu Dikshit','Lucknow','Prof. Pramod Kumar Garg','New Delhi','A. K. Gupta','BARC, Mumbai'),('admin','Prof. U.C. Srivastava','Prayagraj','Prof. Anup Kumar Ghosh ','New Delhi','K. K. Yadav','BARC, Mumbai'),('admin','Prof. Vinod Kumar Singh','Kanpur','Prof. Vimal Kumar Jain','Mumbai','T. Sakuntala ','BARC, Mumbai'),('admin','Prof. Jayesh R. Bellare','Mumbai','Prof. Arun Kumar Pandey ','Bhopal','',''),('admin','Prof. Madhoolika Agrawal','Varanasi','Prof. Anirban Pathak','Noida','',''),('admin','','','Prof. Sheo Mohan Prasad','Prayagraj','',''),('admin','','','Prof. Latha Rangan','Guwahati','',''),('admin','','','Prof. Vijayalakshmi Ravindranath','Bangalore','',''),('admin','','','Prof. Rohit Srivastava','Mumbai','',''),('admin','','','Prof. Nikhil Tandon','New Delhi','',''),('admin','','','Prof. S. M. Yusuf','Mumbai','','');
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contributions`
--

LOCK TABLES `contributions` WRITE;
/*!40000 ALTER TABLE `contributions` DISABLE KEYS */;
INSERT INTO `contributions` VALUES ('admin',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `contributions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `coordinatorList`
--

DROP TABLE IF EXISTS `coordinatorList`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `coordinatorList` (
  `uname` varchar(4) DEFAULT NULL,
  `passwd` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `coordinatorList`
--

LOCK TABLES `coordinatorList` WRITE;
/*!40000 ALTER TABLE `coordinatorList` DISABLE KEYS */;
INSERT INTO `coordinatorList` VALUES ('RSE','admin@nasi2023','sc.ramansehgal@gmail.com','Raman Sehgal'),('AYH','admin@nasi2023','ayush.sehgal@gmail.com','Ayush Sehgal');
/*!40000 ALTER TABLE `coordinatorList` ENABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menuitems`
--

LOCK TABLES `menuitems` WRITE;
/*!40000 ALTER TABLE `menuitems` DISABLE KEYS */;
INSERT INTO `menuitems` VALUES ('Home',1),('About',1),('Committees',1),('Signup',1),('Login',1),('Submissions',1),('Accommodation',1),('Contact',1),('Upload_Contribution',1),('Resubmit_Contribution',0),('View_Contribution',1),('DAECC',1),('Tunga',1),('JewelOfChembur',1),('PGHostel',1),('AuthorLogin',1),('RefereeLogin',1),('Topic',1),('Venue',1),('Poster',1),('ImportantDates',0),('CoordinatorLogin',1),('AdminLogin',1),('Register',1),('Submission_Guidelines',1),('Templates',1),('Abbott',1),('Important_Dates',1),('Yogi',1);
/*!40000 ALTER TABLE `menuitems` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `refereeAllotment`
--

DROP TABLE IF EXISTS `refereeAllotment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `refereeAllotment` (
  `Filename` varchar(255) DEFAULT NULL,
  `refereeName` varchar(4) DEFAULT NULL,
  `refnum` varchar(10) DEFAULT NULL,
  `marks` int DEFAULT '0',
  `remarks` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `refereeAllotment`
--

LOCK TABLES `refereeAllotment` WRITE;
/*!40000 ALTER TABLE `refereeAllotment` DISABLE KEYS */;
INSERT INTO `refereeAllotment` VALUES ('rsehgal_paper_D_g_1.pdf','SLV','ref1',4,'More work needs to be done. Please resubmit it, otherwise it will be rejected'),('rsehgal_paper_D_g_1.pdf','RSE','ref2',8,'Need to do some more work'),('rsehgal_paper_D_g_1.pdf','ASE','ref3',2,'Bad work REJECTED'),('rsehgal_paper_A_b_1.pdf','ASE','ref1',8,'Excellent job, go on doing like this'),('rsehgal_paper_A_b_1.pdf','BRB','ref2',5,'Great, one should work mire'),('rsehgal_paper_A_b_1.pdf','SLV','ref3',9,'Perfect work. Excellent JOB. ORAL'),('rsehgal_paper_D_g_1.pdf','SSE','ref4',0,''),('rsehgal_paper_A_b_1.pdf','SSE','ref4',1,'Dont understand what is he trying to do. REJECTED from my side'),('toro_paper_A_b_2.pdf','RSE','ref1',0,NULL),('toro_paper_A_b_2.pdf','ASE','ref2',0,NULL),('toro_paper_A_b_2.pdf','SSE','ref3',0,NULL),('toro_paper_A_b_2.pdf','SLV','ref4',0,NULL),('rsehgal_paper_B_b_1.pdf','ASE','ref1',0,NULL);
/*!40000 ALTER TABLE `refereeAllotment` ENABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `refereeList`
--

LOCK TABLES `refereeList` WRITE;
/*!40000 ALTER TABLE `refereeList` DISABLE KEYS */;
INSERT INTO `refereeList` VALUES ('RSE','ramansehgal','sc.ramansehgal@gmail.com','Raman Sehgal'),('ASE','ayushsehgal','ayush.sehgal@gmail.com','Ayush Sehgal'),('SSE','shachisehgal','shachi.sehgal@gmail.com','Shachi Sehgal'),('SLV','admin@nasi2023','slv@nasi2023.in','Sunder Lal'),('BRB','admin@nasi2023','brb@nasi2023.in','Bunder Lal'),('ABE','admin@nasi2023','abe@nasi2023.in','Ander Lal');
/*!40000 ALTER TABLE `refereeList` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `registration`
--

DROP TABLE IF EXISTS `registration`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `registration` (
  `uname` varchar(255) DEFAULT NULL,
  `Initials` varchar(15) DEFAULT NULL,
  `FirstName` varchar(500) DEFAULT NULL,
  `LastName` varchar(500) DEFAULT NULL,
  `Gender` varchar(10) DEFAULT NULL,
  `Email` varchar(500) DEFAULT NULL,
  `Affiliation` varchar(1000) DEFAULT NULL,
  `Designation` varchar(100) DEFAULT NULL,
  `Nationality` varchar(500) DEFAULT NULL,
  `Mobile` varchar(15) DEFAULT NULL,
  `Accommodation_Required` varchar(15) DEFAULT NULL,
  `Accommodation_Preference` varchar(100) DEFAULT NULL,
  `Accommodation_Type` varchar(500) DEFAULT NULL,
  `Arrival_Date` datetime DEFAULT NULL,
  `Departure_Date` datetime DEFAULT NULL,
  `Bank_Name` varchar(300) DEFAULT NULL,
  `Date_Of_Transaction` varchar(50) DEFAULT NULL,
  `Payment_Reference_Number` varchar(100) DEFAULT NULL,
  `Amount_Paid` int DEFAULT NULL,
  `Status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `registration`
--

LOCK TABLES `registration` WRITE;
/*!40000 ALTER TABLE `registration` DISABLE KEYS */;
INSERT INTO `registration` VALUES ('admin',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('rsehgal','Dr.\n				 ','Raman\n				 ','Sehgal\n				 ','Male\n				 ','sc.ramansehgal@gmail.com\n				 ','BARC\n				 ','SOF\n				 ','Indian\n				 ','9870091358\n				','Yes\n				 ','DAECC Guest House\n				 ','Single Occupancy\n				 ','2023-06-28 00:00:00','2023-07-07 00:00:00','Punjab National Bank\n				 ','2023-07-14\n				 ','YJHu657OIK\n				 ',7896,'Submitted');
/*!40000 ALTER TABLE `registration` ENABLE KEYS */;
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
  `UploadLocation` varchar(254) DEFAULT NULL,
  `acceptance_end_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `symposium`
--

LOCK TABLES `symposium` WRITE;
/*!40000 ALTER TABLE `symposium` DISABLE KEYS */;
INSERT INTO `symposium` VALUES ('admin',1,'\'India Secure @75\'<br/>\r\n93<sup>rd</sup> Annual Session of National Academy of Sciences (NASI)<br/>\r\n<small class=\'text-light font-weight-bolder\'><u>An endeavour to celebrate and support \'Atma Nirbhar Bharat\'</u></small><br/>\r\n<h1><small class=\'text-danger font-weight-bolder\'>The National Academy of Sciences (NASI) & <br/> Bhabha Atomic Research Centre (BARC), Mumbai<br/>\r\nDAE Convention Centre, BARC, Mumbai<br/>\r\n3<sup>rd</sup>-5<sup>th</sup> December 2023</small></h1>','DAE Convention Center, Anushaktinagar','2023-12-03','2023-12-05','2023-06-01','2023-10-15','2023-06-12','2023-12-31','2023-09-01','2023-09-10','Mumbai','Maharashtra','India',NULL,'Uploads/','2023-09-30');
/*!40000 ALTER TABLE `symposium` ENABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `topics`
--

LOCK TABLES `topics` WRITE;
/*!40000 ALTER TABLE `topics` DISABLE KEYS */;
INSERT INTO `topics` VALUES ('admin','Contributory Paper','C'),('admin','Invited Talk','I');
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
  `creation_date` datetime DEFAULT NULL,
  `Direct` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`uname`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_credentials`
--

LOCK TABLES `user_credentials` WRITE;
/*!40000 ALTER TABLE `user_credentials` DISABLE KEYS */;
INSERT INTO `user_credentials` VALUES ('abcd','efgh','ABCD','EFGH','rsehgal@barc.gov.in',NULL,'No'),('abcdefgh','abcdefgh','ABCD','EFGH','abcd.efgh@xyz.com',NULL,'No'),('ayush','dfjskdjfksdjf','Ayush','Sehgal','ayush.sehgal@gmail.com',NULL,'No'),('harry','potter','Harry','Potter','harry.potter@abcd.com',NULL,'No'),('hellorsehgal','hellorsehgal','Raman','Sehgal','raman.sehgal@abcd.com',NULL,'No'),('PCRout','PCRout~12345','Prakash Chandra ','Rout','pcrout2002@gmail.com',NULL,'No'),('ppppqqqq','ppppqqqq','PPPP','QQQQ','pppp.qqqq@rrrr.com',NULL,'No'),('rarara','rarara','Raman','Sehgal','abc@def.com','2023-06-21 16:56:31','No'),('rsehgal','ABCDEFGH','Raman','Sehgal','sc.ramansehgal@gmail.com',NULL,'No'),('testuser','testuser','TESTUSER','HMMMM','testuser.hmm@abc.com',NULL,'No'),('toro','toro','Toro','Sehgal','toro.sehgal@gmail.com',NULL,'No');
/*!40000 ALTER TABLE `user_credentials` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-09-20 15:34:35
