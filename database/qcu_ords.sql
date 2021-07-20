-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2021 at 02:08 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qcu_ords`
--

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `document_id` varchar(10) NOT NULL,
  `document_name` varchar(50) NOT NULL,
  `requirements` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`document_id`, `document_name`, `requirements`) VALUES
('1', 'GRADESLIP 1st Sem SY 2020-2021', 'Registration Form'),
('11', 'test', 'Req'),
('2', 'Transcript of Records - Immediate', 'Letter of Request from school or company\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `document_request`
--

CREATE TABLE `document_request` (
  `request_number` int(12) NOT NULL,
  `student_number` varchar(10) NOT NULL,
  `document_id` varchar(10) NOT NULL,
  `request_date` date NOT NULL,
  `request_status` varchar(20) NOT NULL,
  `remarks` longtext DEFAULT NULL,
  `upfile` varchar(2048) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `document_request`
--

INSERT INTO `document_request` (`request_number`, `student_number`, `document_id`, `request_date`, `request_status`, `remarks`, `upfile`) VALUES
(1, '18-1824', '1', '2021-07-08', 'PENDING', '', NULL),
(2, '18-1825', '2', '2021-07-09', 'PENDING', '', NULL),
(3, '18-1825', '2', '2021-06-18', 'PENDING', NULL, NULL),
(4, '18-1824', '1', '2021-09-12', 'RESUBMIT', 'Corrupted File', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `student_number` varchar(8) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student_info`
--

CREATE TABLE `student_info` (
  `student_number` varchar(10) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) NOT NULL,
  `full_name` varchar(128) NOT NULL,
  `course` varchar(80) NOT NULL,
  `year` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_info`
--

INSERT INTO `student_info` (`student_number`, `last_name`, `first_name`, `middle_name`, `full_name`, `course`, `year`) VALUES
('18-1824', 'Tolones', 'Sergej Jr.', 'Ranjo', 'Tolones, Sergej Jr. R.', 'BSIT', 3),
('18-1825', 'Xiaodao', 'Ren', 'Xi', 'Xiaodao, Ren X.', 'BSIT', 3);
('18-0581', 'Libuna', 'Rhoshielamie', 'Anas', 'Libuna, Rhoshielamie A.', 'BSIT', '3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`document_id`);

--
-- Indexes for table `document_request`
--
ALTER TABLE `document_request`
  ADD PRIMARY KEY (`request_number`,`student_number`,`document_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`student_number`);

--
-- Indexes for table `student_info`
--
ALTER TABLE `student_info`
  ADD PRIMARY KEY (`student_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `document_request`
--
ALTER TABLE `document_request`
  MODIFY `request_number` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
