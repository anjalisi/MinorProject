-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Dec 08, 2020 at 04:59 AM
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
  `CGPA` varchar(4) DEFAULT NULL,
  `active_back` varchar(50) DEFAULT NULL,
  `dead_back` varchar(50) DEFAULT NULL,
  `resume` varchar(400) DEFAULT NULL,
  `enroll_no` varchar(12) NOT NULL,
  `approve` varchar(10) DEFAULT NULL,
  `grad_year` varchar(10) DEFAULT NULL,
  `recommendation` varchar(400) DEFAULT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student_data`
--

INSERT INTO `student_data` (`Name`, `email`, `password`, `contact`, `CGPA`, `active_back`, `dead_back`, `resume`, `enroll_no`, `approve`, `grad_year`, `recommendation`, `status`) VALUES
('Anjali', 'anju@gmail.com', '1231212', NULL, NULL, NULL, NULL, NULL, '100', NULL, NULL, NULL, 'Closed'),
('Anjali', 'anju@igdtuw.ac.in', 'Anjali@2020', '', '', '', '', '', '100010120173', NULL, '4', NULL, 'Closed'),
('Taniya', 'tanu@mail.com', 'taniya123', '237429857', '4', '', '9', '', '1001', NULL, '', NULL, 'Open'),
('anjali', 'anjuu@gmail.com', 'ifsiodf', NULL, NULL, NULL, NULL, NULL, '2938742983', NULL, NULL, NULL, 'Open');

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
