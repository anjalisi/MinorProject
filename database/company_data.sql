-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Dec 07, 2020 at 02:39 PM
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
  `test_date` date DEFAULT NULL,
  `interview_date` date DEFAULT NULL,
  `deadline_date` date DEFAULT NULL,
  `min_shortlist` varchar(10) DEFAULT NULL,
  `password` varchar(150) DEFAULT NULL,
  `poc_name` varchar(100) DEFAULT NULL,
  `poc_contact` varchar(12) DEFAULT NULL,
  `hr_name` varchar(150) DEFAULT NULL,
  `jd_link` varchar(450) DEFAULT NULL,
  `result_date` date DEFAULT NULL,
  `id` int(10) NOT NULL,
  `approve` int(2) NOT NULL,
  `role` varchar(80) DEFAULT NULL,
  `cgpa` varchar(5) DEFAULT NULL,
  `deadback` int(11) NOT NULL,
  `activeback` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `company_data`
--

INSERT INTO `company_data` (`domain`, `company_name`, `company_email`, `company_contact`, `base`, `ctc`, `location`, `job_profiles`, `test_date`, `interview_date`, `deadline_date`, `min_shortlist`, `password`, `poc_name`, `poc_contact`, `hr_name`, `jd_link`, `result_date`, `id`, `approve`, `role`, `cgpa`, `deadback`, `activeback`) VALUES
('technology', 'a', 'an@gmail.com', '', '', '', '', '', '2020-12-24', '2020-12-16', '2020-12-15', '', 'Anjali@2020', 'Anjali', '', 'Taniya', '', '2020-12-04', 0, 1, '6 Month Intern', '7.5', 3, 2),
('', 'Cisco', 'cisco@gmail.com', '', '', '', '', '', '2020-12-01', '2020-12-02', '2020-12-15', '', 'Cisco@2020', 'Anjali Singh', '', 'HR', '', '2020-12-23', 335885, 1, 'Summer Intern', '', 0, 0),
('Technical', 'Intuit', 'hrname@intuit.com', '9934564738', '12,000,000', '35,000,000', 'Bangalore, Delhi', 'Intern, SDE', '2020-12-15', '2020-12-21', '2020-12-09', '1', 'Anjali@2020', 'Anjali', '3242342434', 'Taniya', 'drive.com', '2020-11-30', 0, 0, NULL, NULL, 0, 0);

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
