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
-- Table structure for table `student_registrations`
--

CREATE TABLE `student_registrations` (
  `stu_id` varchar(13) DEFAULT NULL,
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
  `aback` int(10) NOT NULL,
  `dback` int(10) NOT NULL,
  `approve` int(1) NOT NULL,
  `stu_contact` varchar(12) DEFAULT NULL,
  `profile` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
