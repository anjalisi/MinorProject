-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Jan 13, 2021 at 06:51 AM
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
  `status` varchar(20) NOT NULL,
  `lor` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student_data`
--

INSERT INTO `student_data` (`Name`, `email`, `password`, `contact`, `CGPA`, `active_back`, `dead_back`, `resume`, `enroll_no`, `approve`, `grad_year`, `recommendation`, `status`, `lor`) VALUES
('Taniya', 'taniya@igdtuw.ac.in', 'Taniya@123', '9958246433', '7', 0, 0, '', '08901012017', NULL, 4, NULL, 'Open', 'taniya@igdtuw.ac.in-lor-CSE_7.PDF'),
('Shreya', 'shreya@igdtuw.ac.in', 'Shreya@2020', '', '6.5', 7, 2, '', '09301012017', NULL, 1, NULL, 'Open', NULL),
('anjali', 'anjali@igdtuw.ac.in', 'Anjali@2020', '', '9.0', 0, 2, 'anjali@igdtuw.ac.in-resume-AnjaliResume20-Blue.pdf', '10001012017', NULL, 4, NULL, 'Open', 'anjali@igdtuw.ac.in-lor-sem 7.pdf'),
('Taniya', 'taniya100@igdtuw.ac.in', 'Taniya@123', '', '8', 0, 0, '', '10901012017', NULL, 4, NULL, 'Open', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `student_data`
--
ALTER TABLE `student_data`
  ADD PRIMARY KEY (`enroll_no`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
