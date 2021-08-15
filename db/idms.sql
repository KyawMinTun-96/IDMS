-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 15, 2021 at 10:56 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `idms`
--

-- --------------------------------------------------------

--
-- Table structure for table `committee_tbl`
--

CREATE TABLE `committee_tbl` (
  `comm_id` int(11) NOT NULL,
  `comm_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `committee_tbl`
--

INSERT INTO `committee_tbl` (`comm_id`, `comm_name`) VALUES
(1, 'Facebook Marketing'),
(2, 'Linkedin Marketing'),
(3, 'Blog'),
(4, 'Training');

-- --------------------------------------------------------

--
-- Table structure for table `department_tbl`
--

CREATE TABLE `department_tbl` (
  `deptt_id` int(11) NOT NULL,
  `deptt_name` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `department_tbl`
--

INSERT INTO `department_tbl` (`deptt_id`, `deptt_name`) VALUES
(1, 'Marketing Department'),
(2, 'Operations Department'),
(3, 'Finance Department'),
(4, 'Purchase Department'),
(5, 'Human Resources Department'),
(6, 'Service Department');

-- --------------------------------------------------------

--
-- Table structure for table `upload_tbl`
--

CREATE TABLE `upload_tbl` (
  `doc_id` int(11) NOT NULL,
  `comm_dept` varchar(30) NOT NULL,
  `com_dept_id` int(11) NOT NULL,
  `act_type` varchar(40) NOT NULL,
  `act_name` varchar(200) NOT NULL,
  `act_coordinator` varchar(50) NOT NULL,
  `act_from_date` date NOT NULL,
  `act_to_date` date NOT NULL,
  `doc_path` varchar(100) NOT NULL,
  `upload_date` date NOT NULL,
  `upload_time` time NOT NULL,
  `uploaded_by` varchar(50) NOT NULL,
  `remarks` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users_tbl`
--

CREATE TABLE `users_tbl` (
  `id` int(11) NOT NULL,
  `user_name` varchar(60) NOT NULL,
  `password` varchar(30) NOT NULL,
  `user_type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_tbl`
--

INSERT INTO `users_tbl` (`id`, `user_name`, `password`, `user_type`) VALUES
(1, 'admin', 'admin123123', 'admin'),
(2, 'user', 'user123123', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `committee_tbl`
--
ALTER TABLE `committee_tbl`
  ADD PRIMARY KEY (`comm_id`);

--
-- Indexes for table `department_tbl`
--
ALTER TABLE `department_tbl`
  ADD PRIMARY KEY (`deptt_id`);

--
-- Indexes for table `users_tbl`
--
ALTER TABLE `users_tbl`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `committee_tbl`
--
ALTER TABLE `committee_tbl`
  MODIFY `comm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `department_tbl`
--
ALTER TABLE `department_tbl`
  MODIFY `deptt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
