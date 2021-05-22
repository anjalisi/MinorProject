-- MySQL dump 10.13  Distrib 5.7.33, for Linux (x86_64)
--
-- Host: localhost    Database: campus_recruitement
-- ------------------------------------------------------
-- Server version	5.7.33-cll-lve

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admin_data`
--

DROP TABLE IF EXISTS `admin_data`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin_data` (
  `email_id` varchar(100) NOT NULL,
  `password` varchar(150) NOT NULL,
  PRIMARY KEY (`email_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_data`
--

LOCK TABLES `admin_data` WRITE;
/*!40000 ALTER TABLE `admin_data` DISABLE KEYS */;
INSERT INTO `admin_data` (`email_id`, `password`) VALUES ('igdtuwrecruits@gmail.com','RecruitmentPortal@2021');
/*!40000 ALTER TABLE `admin_data` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `company_data`
--

DROP TABLE IF EXISTS `company_data`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `company_data` (
  `domain` varchar(80) DEFAULT NULL,
  `company_name` varchar(100) NOT NULL,
  `company_email` varchar(200) NOT NULL,
  `company_contact` varchar(12) DEFAULT NULL,
  `base` varchar(20) DEFAULT NULL,
  `ctc` varchar(20) DEFAULT NULL,
  `location` varchar(300) DEFAULT NULL,
  `job_profiles` varchar(450) DEFAULT NULL,
  `test_date` date DEFAULT '2020-11-11',
  `interview_date` date DEFAULT '2020-11-11',
  `deadline_date` date DEFAULT '2020-11-11',
  `min_shortlist` varchar(10) DEFAULT NULL,
  `password` varchar(150) DEFAULT NULL,
  `poc_name` varchar(100) DEFAULT NULL,
  `poc_contact` varchar(12) DEFAULT NULL,
  `hr_name` varchar(150) DEFAULT NULL,
  `jd_link` varchar(450) DEFAULT NULL,
  `result_date` date DEFAULT '2020-11-11',
  `id` int(10) NOT NULL,
  `approve` int(2) NOT NULL DEFAULT '0',
  `role` varchar(80) DEFAULT NULL,
  `cgpa` varchar(5) DEFAULT NULL,
  `deadback` int(11) NOT NULL DEFAULT '0',
  `activeback` int(11) NOT NULL DEFAULT '0',
  `token` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`company_email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `company_data`
--

LOCK TABLES `company_data` WRITE;
/*!40000 ALTER TABLE `company_data` DISABLE KEYS */;
INSERT INTO `company_data` (`domain`, `company_name`, `company_email`, `company_contact`, `base`, `ctc`, `location`, `job_profiles`, `test_date`, `interview_date`, `deadline_date`, `min_shortlist`, `password`, `poc_name`, `poc_contact`, `hr_name`, `jd_link`, `result_date`, `id`, `approve`, `role`, `cgpa`, `deadback`, `activeback`, `token`) VALUES ('Technical','Amazon','amazon@gmail.com','8447316496','60k','60k','WFH','SDE Intern','2021-05-24','2021-05-26','2021-05-22','10','3bb2b7e72a02151b3ac943122c6f3082','Taniya','8920342101','Shreya','','2020-11-28',503848,1,'Summer Intern','7.0',0,0,NULL),('Technical','Cisco','cisco@gmail.com','9958246433','10Lpa','20Lpa','Bangalore','SDE','2021-05-05','2021-05-12','2021-05-20','3','35f36876eb4d9af899058c9334821fcc','Anjali','9958246433','Samrudh','','2021-05-14',533694,0,'Dual Offer(6 month+FTE)','7.0',0,1,''),('Technical','Deutsche Bank','db@gmail.com','8447316496','30k','30k','WFH','Data Analyst Intern','2021-05-23','2021-05-24','2021-05-22','5','a91fdfaf33637aea863e085a2f5e3fbb','Anjali','8447316496','Chitra','','2020-11-28',361336,1,'Summer Intern','7.0',0,1,NULL),('Technical','Google','google@gmail.com','8447316496','10Lpa','30Lpa','Bangalore','SDE','2021-05-09','2021-05-12','2021-05-06','9','c1caa2d6b74d007115da4e7a12c890b7','Taniya','8920342101','Google','','2021-05-15',711061,1,'Full Time Employee','7.0',0,0,NULL),('Technical','Microsoft','microsoft@gmail.com','8447316496','15lpa','25lpa','Bangalore','Software Engineer','2021-05-20','2021-05-21','2021-05-10','5','ba516f8d4cb1f74c0d11ac67a2fa0f5e','Taniya','8888888999','Shreya','','2021-05-22',851774,1,'6 Month Intern','8.0',0,0,'edea1fbb5a7d32f40a2280df30116c'),('Technical','Societe Generale','socgen@gmail.com','8447316496','10lpa','15lpa','Bangalore','Software Engineer','2021-05-12','2021-05-13','2021-05-11','9','1b60d138396eccab38cdb4208de66645','Shreya','8447316496','Shreya','','2021-05-16',146158,1,'Full Time Employee','7.0',0,0,NULL),(NULL,'Intuit','tanu2599@gmail.com',NULL,NULL,NULL,NULL,NULL,'2020-11-11','2020-11-11','2020-11-11',NULL,'4f0378fca74f5255e69a7a0f228ca035',NULL,NULL,'Taniya',NULL,'2020-11-11',38955,0,NULL,NULL,0,0,''),(NULL,'test','test@gmail.com',NULL,NULL,NULL,NULL,NULL,'2021-04-18','2021-04-18','2021-04-18',NULL,'e2b9969a913f38d94d844cc3086327ea',NULL,NULL,'test',NULL,'2020-11-11',216260,0,NULL,NULL,0,0,NULL);
/*!40000 ALTER TABLE `company_data` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `file_uploads`
--

DROP TABLE IF EXISTS `file_uploads`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `file_uploads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `filename` varchar(255) DEFAULT NULL,
  `filesize` int(11) DEFAULT NULL,
  `student_name` varchar(200) DEFAULT NULL,
  `student_mail` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `file_uploads`
--

LOCK TABLES `file_uploads` WRITE;
/*!40000 ALTER TABLE `file_uploads` DISABLE KEYS */;
/*!40000 ALTER TABLE `file_uploads` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student_data`
--

DROP TABLE IF EXISTS `student_data`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `student_data` (
  `Name` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `contact` varchar(10) DEFAULT NULL,
  `CGPA` varchar(4) DEFAULT '0',
  `active_back` int(5) DEFAULT '0',
  `dead_back` int(5) DEFAULT '0',
  `resume` varchar(400) DEFAULT NULL,
  `enroll_no` varchar(12) NOT NULL,
  `approve` varchar(10) DEFAULT NULL,
  `grad_year` int(5) DEFAULT '1',
  `recommendation` varchar(400) DEFAULT NULL,
  `status` varchar(20) NOT NULL,
  `lor` varchar(250) DEFAULT NULL,
  `token` varchar(100) NOT NULL,
  `approve2` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`enroll_no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student_data`
--

LOCK TABLES `student_data` WRITE;
/*!40000 ALTER TABLE `student_data` DISABLE KEYS */;
INSERT INTO `student_data` (`Name`, `email`, `password`, `contact`, `CGPA`, `active_back`, `dead_back`, `resume`, `enroll_no`, `approve`, `grad_year`, `recommendation`, `status`, `lor`, `token`, `approve2`) VALUES ('Anisha Manoj Razdan','anisha002btcse17@igdtuw.ac.in','fbd39819630747c38d6290c260cd8e46',NULL,'0',0,0,NULL,'00201012017',NULL,1,NULL,'Open',NULL,'',1),('Isha Gautam','isha003btcse17@igdtuw.ac.in','9d3aa98720813362b99c5626db91186c',NULL,'0',0,0,NULL,'00301012017',NULL,1,NULL,'Open',NULL,'',1),('Juhi Agarwal','juhi004btcse17@igdtuw.ac.in','b2bbde1646f3e63d7362c77e20ba1065',NULL,'0',0,0,NULL,'00401012017',NULL,1,NULL,'Open',NULL,'',1),('Nimisha Gupta','nimisha017btcse17@igdtuw.ac.in','9baee4da58f8b3ffe4595e0edafba642',NULL,'0',0,0,NULL,'01701012017',NULL,1,NULL,'Open',NULL,'',1),('Vritika','vritika026btcse17@igdtuw.ac.in','59ded8a8948e8cd28d65f0517973be4b',NULL,'0',0,0,NULL,'02601012017',NULL,1,NULL,'Open',NULL,'',1),('Vanshika Uniyal','vanshika032btcse18@igdtuw.ac.in','b23b1feebf57ffb29c84d1748da0eb84',NULL,'0',0,0,NULL,'02901012018',NULL,1,NULL,'Open',NULL,'',1),('Shreya Prasad','shreya031btcse17@igdtuw.ac.in','7088eaba3bb2794ee7b04155eca6db4f','8130804595','7.3',0,3,'shreya031btcse17@igdtuw.ac.in-resume-Shreya_Prasad_Latest_Resume (4).pdf','03101012017',NULL,4,NULL,'Open',NULL,'',1),('Jigyasa Khaneja','jigyasa039btcse17@igdtuw.ac.in','b37f777a629602e09bc9bc9f40a6195d','8860042456','0',0,0,NULL,'03901012017',NULL,4,NULL,'Open',NULL,'',1),('Dikshita Arora','dikshita041btcse17@igdtuw.ac.in','c4d98bd3d5a0ace8ace6a58983997930',NULL,'0',0,0,NULL,'04101012017',NULL,1,NULL,'Open',NULL,'',1),('Jyoti Rani','jyoti047btit17@igdtuw.ac.in','3a05267c6af5a8893707f35860f47d70',NULL,'0',0,0,NULL,'04701032017',NULL,1,NULL,'Open',NULL,'c1c8096d85f08527e2b079a694cf78',0),('Mahima sejwal','mahima048btcse17@igdtuw.ac.in','3cbdb1aa5eae4d24ec9b16e9ef0b1696',NULL,'0',0,0,NULL,'04801012017',NULL,1,NULL,'Open',NULL,'aff3e34b3c2f9c59aaf6fada390a5f',0),('Shubhika Bhardwaj','shubhika054btcse17@igdtuw.ac.in','27892b2354706bdbd28e6dc6fd188449',NULL,'0',0,0,NULL,'05401012017',NULL,1,NULL,'Open',NULL,'',1),('Mansi Kesharwani','mansi056btece17@igdtuw.ac.in','6f58cf48003d4f6b3959d182fe0110fe',NULL,'0',0,0,NULL,'05601022017',NULL,1,NULL,'Open',NULL,'8ddf4368ab38332ae9771236778a1a',0),('Kshitjja','kshitija060btcse17@igdtuw.ac.in','3ed227b6013ba98c43e6350760f0dae3',NULL,'0',0,0,NULL,'06001012017',NULL,1,NULL,'Open',NULL,'',1),('Anukriti Jain','anukriti063btcse17@igdtuw.ac.in','21250a488944250e1c118004dd228210',NULL,'0',0,0,NULL,'06301012017',NULL,1,NULL,'Open',NULL,'',1),('Anushree Khanna','anushree073btcse17@igdtuw.ac.in','e93f82579de79756e705f5640a1e97e3',NULL,'0',0,0,NULL,'07301012017',NULL,4,NULL,'Open',NULL,'',1),('Kriti Bindra','kritibindra081btcse17@igdtuw.ac.in','cfc2e636ca707a2c0a68c2c7fbc898d8',NULL,'0',0,0,NULL,'08101012017',NULL,1,NULL,'Open',NULL,'',1),('Bhavya Bhavya','bhavya083btcse17@igdtuw.ac.in','71b65d8786591696eaae9380dadabb2f',NULL,'0',0,0,NULL,'08301012017',NULL,1,NULL,'Open',NULL,'8e77a915bd17631d416d598befa030',0),('Lavisha ','lavisha084btcse17@igdtuw.ac.in','eedbb7aae92e1a0f52e742f3fd575110',NULL,'0',0,0,NULL,'08401012017',NULL,1,NULL,'Open',NULL,'',1),('Ginni Angurala','ginni092btcse18@igdtuw.ac.in','cd84d683cc5612c69efe115c80d0b7dc',NULL,'0',0,0,NULL,'08601012018',NULL,1,NULL,'Open',NULL,'',1),('Taniya','taniya089btcse17@igdtuw.ac.in','9e86d07284b1a708b5a955851da34878','8920342101','8.5',0,0,NULL,'08901012017',NULL,4,NULL,'Open',NULL,'',1),('Shreya Srivatsan','shreya093btcse17@igdtuw.ac.in','bcb64d2300593d675ba4b19982f1b9ea','8447316496','7.9',0,0,NULL,'09301012017',NULL,4,NULL,'Open',NULL,'',1),('Muskan Bhardwaj','muskan101btcse@igdtuw.ac.in','f2e7f9899672124b4d6f1661d7b1c634',NULL,'0',0,0,NULL,'09501012018',NULL,1,NULL,'Open',NULL,'e85e60cad9072bc12477bfaf009606',0),('Anjali Singh','anjali100btcse17@igdtuw.ac.in','432cb50540d6903e4bedc43978cef1ff','9958246433','7.3',0,0,'anjali100btcse17@igdtuw.ac.in-resume-Singh, Anjali Resume 30-April-2021.pdf','10001012017',NULL,4,NULL,'Open',NULL,'',1),('Ruchika','ruchika103btcse17@igdtuw.ac.in','6ad2c12c388f254250c88158aad8a4d3',NULL,'0',0,0,NULL,'10301012017',NULL,1,NULL,'Open',NULL,'3f11402edce8c596797f10e96baab7',0),('Mansi Bansal','mansi108btcse17@igdtuw.ac.in','a10448b25e0782e0087b49f600cbb56c',NULL,'0',0,0,NULL,'10801012017',NULL,1,NULL,'Open',NULL,'',1),('Pranati Mittal','pranati111btcse17@igdtuw.ac.in','0b295482f8bc2e0f7009dfde561dfbf8','0000000000','7.69',0,0,NULL,'11101012017',NULL,4,NULL,'Open',NULL,'',1),('Priyasha','priyasha116btcse17@igdtuw.ac.in','c489d209b923e419577f9aac2a8ce753',NULL,'0',0,0,NULL,'11601012017',NULL,1,NULL,'Open',NULL,'',1),('Abhipsa Jena','abhipsajena123btcse18@igdtuw.ac.in','c5d5e5a1ebd5867daf855d4e6de5903e',NULL,'0',0,0,NULL,'11601012018',NULL,1,NULL,'Open',NULL,'',1),('Sanjana','sanjana120btcse17@igdtuw.ac.in','0788142e9fcf955a804f616b95b115cb',NULL,'0',0,0,NULL,'12001012017',NULL,1,NULL,'Open',NULL,'',1),('Omi Ojashwini ','omi128btcse17@igdtuw.ac.in','a48cba74259fe515dd1e02a2bdded4b4','8800226569','8.2',0,0,NULL,'12801012017',NULL,4,NULL,'Open',NULL,'',1),('Geetu','geetu132btcse17@igdtuw.ac.in','74da11297e77e5e30c416a75b1f9bb62',NULL,'0',0,0,NULL,'13201012017',NULL,1,NULL,'Open',NULL,'6e7a9505c54f0ed629013aff6d0134',0),('Sakshi Suman','sakshi136btcse@igdtuw.ac.in','44c6b061ff5d2c562599f9a5055395aa',NULL,'0',0,0,NULL,'13601012017',NULL,1,NULL,'Open',NULL,'5d192a7dd9fcea9127abffad401be6',0),('Divya','divya053btmae17@igdtuw.ac.in','6ef0cb810332c14c84b9cf67054df4e0','9899364605','8.97',0,0,NULL,'15701012017',NULL,4,NULL,'Open',NULL,'',1);
/*!40000 ALTER TABLE `student_data` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student_registrations`
--

DROP TABLE IF EXISTS `student_registrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `student_registrations` (
  `stu_id` varchar(100) DEFAULT NULL,
  `id` int(11) NOT NULL,
  `rec_id` varchar(100) DEFAULT NULL,
  `applied_date` date DEFAULT NULL,
  `deadline_date` date DEFAULT NULL,
  `rec_name` varchar(100) DEFAULT NULL,
  `rounds` int(8) NOT NULL,
  `status` varchar(200) DEFAULT NULL,
  `stu_name` varchar(100) DEFAULT NULL,
  `stu_year` int(11) NOT NULL,
  `role` varchar(100) DEFAULT NULL,
  `stu_cgpa` varchar(8) DEFAULT NULL,
  `rec_jd` varchar(450) DEFAULT NULL,
  `stu_res` varchar(450) DEFAULT NULL,
  `aback` varchar(10) DEFAULT NULL,
  `dback` varchar(10) DEFAULT NULL,
  `approve` int(1) NOT NULL,
  `stu_contact` varchar(12) DEFAULT NULL,
  `profile` varchar(100) DEFAULT NULL,
  `lor` varchar(200) DEFAULT '-',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student_registrations`
--

LOCK TABLES `student_registrations` WRITE;
/*!40000 ALTER TABLE `student_registrations` DISABLE KEYS */;
INSERT INTO `student_registrations` (`stu_id`, `id`, `rec_id`, `applied_date`, `deadline_date`, `rec_name`, `rounds`, `status`, `stu_name`, `stu_year`, `role`, `stu_cgpa`, `rec_jd`, `stu_res`, `aback`, `dback`, `approve`, `stu_contact`, `profile`, `lor`) VALUES ('xyz@igdtuw.ac.in',1114,'Cisco@gmail.com','2021-04-17','2020-11-11','Cisco',0,'Registered','Hello',4,'Dual Offer(6 month+FTE)','7.9','','','0','0',1,'9958246433','','Not Present'),('shreya093btcse17@igdtuw.ac.in',5445,'google@gmail.com','2021-04-30','2021-05-06','Google',4,'Shortlisted','Shreya Srivatsan',4,'Full Time Employee','7.9','','','0','0',1,'8447316496','SDE',''),('shreya093btcse17@igdtuw.ac.in',137211,'Cisco@gmail.com','2021-05-04','2021-05-02','Cisco',0,'Registered','Shreya Srivatsan',4,'Dual Offer(6 month+FTE)','7.9','','','0','0',1,'8447316496','SDE',''),('shreya093btcse17@igdtuw.ac.in',200729,'socgen@gmail.com','2021-05-02','2021-05-11','Societe Generale',0,'Registered','Shreya Srivatsan',4,'Full Time Employee','7.9','','','0','0',1,'8447316496','Software Engineer',''),('hehe@igdtuw.ac.in',246426,'Cisco@gmail.com','2021-04-17','2020-11-11','Cisco',0,'Registered','Hehehe',4,'Dual Offer(6 month+FTE)','0','','','0','0',1,'9999999929','','Not Present'),('anjali100btcse17@igdtuw.ac.in',440564,'padfoot2299@gmail.com','2021-05-02','2021-05-10','Microsoft',0,'Registered','Anjali Singh',4,'6 Month Intern','8.3','','','0','0',1,'9958246433','Software Engineer',''),('anjali100btcse17@igdtuw.ac.in',587184,'Cisco@gmail.com','2021-05-02','2021-05-02','Cisco',3,'Selected','Anjali Singh',4,'Dual Offer(6 month+FTE)','8.3','','','0','0',1,'9958246433','SDE',''),('ragini@igdtuw.ac.in',672233,'Cisco@gmail.com','2021-04-17','2020-11-11','Cisco',0,'Registered','Ragini Sharma',1,'Dual Offer(6 month+FTE)','0','','','0','0',1,'','','Not Present'),('anjali100btcse17@igdtuw.ac.in',850731,'google@gmail.com','2021-05-22','2021-05-06','Google',0,'Registered','Anjali Singh',4,'Full Time Employee','7.3','','anjali100btcse17@igdtuw.ac.in-resume-Singh, Anjali Resume 30-April-2021.pdf','0','0',1,'9958246433','SDE','');
/*!40000 ALTER TABLE `student_registrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'campus_recruitement'
--

--
-- Dumping routines for database 'campus_recruitement'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-05-22 10:15:09
