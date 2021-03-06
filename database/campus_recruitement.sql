-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Dec 09, 2020 at 07:30 AM
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
-- Table structure for table `admin_data`
--

CREATE TABLE `admin_data` (
  `email_id` varchar(100) NOT NULL,
  `password` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin_data`
--

INSERT INTO `admin_data` (`email_id`, `password`) VALUES
('anjali@gmail.com', 'anjali');

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
  `approve` int(2) NOT NULL DEFAULT '1',
  `role` varchar(80) DEFAULT NULL,
  `cgpa` varchar(5) DEFAULT NULL,
  `deadback` int(11) NOT NULL DEFAULT '0',
  `activeback` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `company_data`
--

INSERT INTO `company_data` (`domain`, `company_name`, `company_email`, `company_contact`, `base`, `ctc`, `location`, `job_profiles`, `test_date`, `interview_date`, `deadline_date`, `min_shortlist`, `password`, `poc_name`, `poc_contact`, `hr_name`, `jd_link`, `result_date`, `id`, `approve`, `role`, `cgpa`, `deadback`, `activeback`) VALUES
('', 'Cisco', 'cisco@gmail.com', '', '', '', '', '', '2020-12-08', '2020-12-16', '2020-12-17', '', 'CIsco@2020', '', '', 'Anjali', '', '2020-12-16', 627354, 1, 'Full Time Employee', '7', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `student_data`
--

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
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student_data`
--

INSERT INTO `student_data` (`Name`, `email`, `password`, `contact`, `CGPA`, `active_back`, `dead_back`, `resume`, `enroll_no`, `approve`, `grad_year`, `recommendation`, `status`) VALUES
('anjali', 'anjali@igdtuw.ac.in', 'Anjali@2020', '', '0', 0, 0, '', '10001012017', NULL, 4, NULL, 'Open');

-- --------------------------------------------------------

--
-- Table structure for table `student_registrations`
--

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
  `profile` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student_registrations`
--

INSERT INTO `student_registrations` (`stu_id`, `id`, `rec_id`, `applied_date`, `deadline_date`, `rec_name`, `rounds`, `status`, `stu_name`, `stu_year`, `role`, `stu_cgpa`, `rec_jd`, `stu_res`, `aback`, `dback`, `approve`, `stu_contact`, `profile`) VALUES
('anjali@igdtuw.ac.in', 577730, 'cisco@gmail.com', '2020-12-09', '2020-12-17', 'Cisco', 1, 'Selected', 'anjali', 4, 'Full Time Employee', '0', '', '', '0', '0', 1, '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_data`
--
ALTER TABLE `admin_data`
  ADD PRIMARY KEY (`email_id`);

--
-- Indexes for table `company_data`
--
ALTER TABLE `company_data`
  ADD PRIMARY KEY (`company_email`);

--
-- Indexes for table `student_data`
--
ALTER TABLE `student_data`
  ADD PRIMARY KEY (`enroll_no`);

--
-- Indexes for table `student_registrations`
--
ALTER TABLE `student_registrations`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
