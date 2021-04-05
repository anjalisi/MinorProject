-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Apr 05, 2021 at 03:43 PM
-- Server version: 5.7.24
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `campus_recruitement`
--

-- --------------------------------------------------------

--
-- Table structure for table `company_data`
--

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
  `activeback` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `company_data`
--

INSERT INTO `company_data` (`domain`, `company_name`, `company_email`, `company_contact`, `base`, `ctc`, `location`, `job_profiles`, `test_date`, `interview_date`, `deadline_date`, `min_shortlist`, `password`, `poc_name`, `poc_contact`, `hr_name`, `jd_link`, `result_date`, `id`, `approve`, `role`, `cgpa`, `deadback`, `activeback`) VALUES
('', 'Cisco', 'cisco@gmail.com', '', '8L', '10L', '', '', '2020-12-08', '2020-12-16', '2020-12-17', '', 'CIsco@2020', 'Taniya', '1909837562', 'Anjali', '', '2020-12-16', 627354, 1, 'Full Time Employee', '7', 0, 0),
('', 'Microsoft', 'microsoft@gmail.com', '9958246909', '8L', '12L', '', '', '2020-11-11', '2020-11-11', '2020-11-11', '', 'Microsoft@2020', '', '1829374859', 'Bill Gates', '', '2020-11-11', 356889, 1, 'Full Time Employee', '7.5', 0, 0),
(NULL, 'Paytm', 'paytm@gmail.com', NULL, NULL, NULL, NULL, NULL, '2020-11-11', '2020-11-11', '2020-11-11', NULL, 'f75d15a90093b555cec5498247b34f00', NULL, NULL, 'Ragini Sharma', NULL, '2020-11-11', 727071, 0, NULL, NULL, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company_data`
--
ALTER TABLE `company_data`
  ADD PRIMARY KEY (`company_email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
